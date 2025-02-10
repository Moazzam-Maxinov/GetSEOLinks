import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom/client";
import axios from "axios";
import {
    flexRender,
    getCoreRowModel,
    useReactTable,
} from "@tanstack/react-table";
import {
    ExternalLink,
    ShoppingCart,
    ChevronLeft,
    ChevronRight,
    Filter,
    Check,
} from "lucide-react";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import {
    Command,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
} from "@/components/ui/command";
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from "@/components/ui/popover";
import { Slider } from "@/components/ui/slider";
import { cn } from "@/lib/utils";
import { Input } from "@/components/ui/input";
import { Separator } from "@/components/ui/separator";

const WebsitesTable = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [categories, setCategories] = useState([]);
    const [filters, setFilters] = useState({
        categories: [],
        traffic: { min: 0, max: 1000000 },
        da: { min: 0, max: 100 },
        dr: { min: 0, max: 100 },
        price: { min: 0, max: 10000 },
    });
    const [pagination, setPagination] = useState({
        pageIndex: 0,
        pageSize: 10,
        pageCount: 0,
        total: 0,
    });

    // Fetch categories on mount
    useEffect(() => {
        const fetchCategories = async () => {
            try {
                const response = await axios.get("/api/getAllCategories");
                setCategories(response.data);
                console.log(response.data);
            } catch (error) {
                console.error("Error fetching categories:", error);
            }
        };
        fetchCategories();
    }, []);

    const columns = [
        /* ... existing columns ... */
        {
            accessorKey: "name",
            header: "Website",
            cell: ({ row }) => {
                const website = row.original;
                return (
                    <div className="space-y-2">
                        <div className="font-medium">{website.name}</div>
                        <div className="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1">
                            {website.masked_url} <ExternalLink size={14} />
                        </div>
                        <div className="flex flex-wrap gap-1">
                            {website.allowed_link_types?.map((type) => (
                                <Badge
                                    key={type}
                                    variant="secondary"
                                    className="text-xs bg-slate-300 text-gray-700"
                                >
                                    {type}
                                </Badge>
                            ))}
                        </div>
                    </div>
                );
            },
        },
        {
            accessorKey: "categories",
            header: "Categories",
            cell: ({ row }) => (
                <div className="flex flex-wrap gap-1">
                    {row.original.categories?.map((cat) => (
                        <Badge
                            key={cat.id}
                            variant="default"
                            className="bg-blue-100 text-blue-800 hover:bg-blue-200"
                        >
                            {cat.name}
                        </Badge>
                    ))}
                </div>
            ),
        },
        {
            accessorKey: "monthly_traffic",
            header: "Traffic",
            cell: ({ getValue }) => getValue()?.toLocaleString(),
        },
        {
            accessorKey: "domain_authority",
            header: "DA",
        },
        {
            accessorKey: "domain_rating",
            header: "DR",
        },
        {
            accessorKey: "price",
            header: "Price",
            cell: ({ getValue }) => (
                <div className="text-emerald-600 font-bold">
                    ${getValue()?.toLocaleString()}
                </div>
            ),
        },
        {
            id: "actions",
            header: "Actions",
            cell: ({ row }) => (
                <div className="flex gap-2">
                    <Button
                        size="sm"
                        className="bg-emerald-600"
                        onClick={() =>
                            (window.location.href = `/websites/${row.original.id}`)
                        }
                    >
                        <ShoppingCart className="w-4 h-4 mr-1" />
                        Buy Link
                    </Button>
                </div>
            ),
        },
    ];

    const fetchData = async () => {
        try {
            setLoading(true);
            const response = await axios.get("/api/getAllWebsites", {
                params: {
                    page: pagination.pageIndex + 1,
                    perPage: pagination.pageSize,
                    filters: filters,
                },
            });

            setData(response.data.data);
            setPagination((prev) => ({
                ...prev,
                pageCount: Math.ceil(
                    response.data.meta.total / pagination.pageSize
                ),
                total: response.data.meta.total,
            }));
        } catch (error) {
            console.error("Error fetching websites:", error);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchData();
    }, [pagination.pageIndex, pagination.pageSize, filters]);

    const table = useReactTable({
        data,
        columns,
        getCoreRowModel: getCoreRowModel(),
        manualPagination: true,
        pageCount: pagination.pageCount,
    });

    const FilterCard = () => (
        <Card className="mb-6">
            <CardHeader>
                <CardTitle className="text-lg flex items-center gap-2">
                    <Filter className="w-5 h-5" />
                    Filters
                </CardTitle>
            </CardHeader>
            <CardContent>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {/* Categories Filter */}
                    <div className="space-y-2">
                        <label className="text-sm font-medium">
                            Categories
                        </label>
                        <Popover>
                            <PopoverTrigger asChild>
                                <Button
                                    variant="outline"
                                    className="w-full justify-start"
                                >
                                    {filters.categories.length === 0
                                        ? "Select categories..."
                                        : `${filters.categories.length} selected`}
                                </Button>
                            </PopoverTrigger>
                            <PopoverContent
                                className="w-full p-0"
                                align="start"
                            >
                                <Command>
                                    <CommandInput placeholder="Search categories..." />
                                    <CommandEmpty>
                                        No categories found.
                                    </CommandEmpty>
                                    <CommandGroup className="max-h-64 overflow-auto">
                                        {categories.map((category) => (
                                            <CommandItem
                                                key={category.id}
                                                onSelect={() => {
                                                    setFilters((prev) => {
                                                        const newCategories =
                                                            prev.categories.includes(
                                                                category.id
                                                            )
                                                                ? prev.categories.filter(
                                                                      (id) =>
                                                                          id !==
                                                                          category.id
                                                                  )
                                                                : [
                                                                      ...prev.categories,
                                                                      category.id,
                                                                  ];
                                                        return {
                                                            ...prev,
                                                            categories:
                                                                newCategories,
                                                        };
                                                    });
                                                }}
                                            >
                                                <div
                                                    className={cn(
                                                        "mr-2 flex h-4 w-4 items-center justify-center rounded-sm border border-primary",
                                                        filters.categories.includes(
                                                            category.id
                                                        )
                                                            ? "bg-primary text-primary-foreground"
                                                            : "opacity-50 [&_svg]:invisible"
                                                    )}
                                                >
                                                    <Check
                                                        className={cn(
                                                            "h-4 w-4"
                                                        )}
                                                    />
                                                </div>
                                                {category.name}
                                            </CommandItem>
                                        ))}
                                    </CommandGroup>
                                </Command>
                            </PopoverContent>
                        </Popover>
                    </div>

                    {/* Range Filters */}
                    <div className="space-y-6">
                        {/* Traffic Filter */}
                        <div className="space-y-2">
                            <label className="text-sm font-medium">
                                Monthly Traffic
                            </label>
                            <div className="flex gap-4">
                                <Input
                                    type="number"
                                    value={filters.traffic.min}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            traffic: {
                                                ...prev.traffic,
                                                min: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    value={filters.traffic.max}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            traffic: {
                                                ...prev.traffic,
                                                max: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Max"
                                />
                            </div>
                        </div>

                        {/* DA Filter */}
                        <div className="space-y-2">
                            <label className="text-sm font-medium">
                                Domain Authority (DA)
                            </label>
                            <div className="flex gap-4">
                                <Input
                                    type="number"
                                    value={filters.da.min}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            da: {
                                                ...prev.da,
                                                min: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    value={filters.da.max}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            da: {
                                                ...prev.da,
                                                max: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Max"
                                />
                            </div>
                        </div>

                        {/* DR Filter */}
                        <div className="space-y-2">
                            <label className="text-sm font-medium">
                                Domain Rating (DR)
                            </label>
                            <div className="flex gap-4">
                                <Input
                                    type="number"
                                    value={filters.dr.min}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            dr: {
                                                ...prev.dr,
                                                min: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    value={filters.dr.max}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            dr: {
                                                ...prev.dr,
                                                max: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Max"
                                />
                            </div>
                        </div>

                        {/* Price Filter */}
                        <div className="space-y-2">
                            <label className="text-sm font-medium">
                                Price ($)
                            </label>
                            <div className="flex gap-4">
                                <Input
                                    type="number"
                                    value={filters.price.min}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            price: {
                                                ...prev.price,
                                                min: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    value={filters.price.max}
                                    onChange={(e) =>
                                        setFilters((prev) => ({
                                            ...prev,
                                            price: {
                                                ...prev.price,
                                                max: parseInt(e.target.value),
                                            },
                                        }))
                                    }
                                    className="w-24"
                                    placeholder="Max"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div className="flex justify-end mt-6">
                    <Button
                        variant="outline"
                        onClick={() => {
                            setFilters({
                                categories: [],
                                traffic: { min: 0, max: 1000000 },
                                da: { min: 0, max: 100 },
                                dr: { min: 0, max: 100 },
                                price: { min: 0, max: 10000 },
                            });
                        }}
                    >
                        Reset Filters
                    </Button>
                </div>
            </CardContent>
        </Card>
    );

    return (
        <div>
            <FilterCard />
            {/* ... rest of the existing table component ... */}
            <Card className="w-full">
                <CardHeader>
                    <CardTitle>Websites</CardTitle>
                </CardHeader>
                <CardContent className="p-6">
                    <div className="rounded-md border">
                        <Table>
                            <TableHeader>
                                {table.getHeaderGroups().map((headerGroup) => (
                                    <TableRow key={headerGroup.id}>
                                        {headerGroup.headers.map((header) => (
                                            <TableHead key={header.id}>
                                                {flexRender(
                                                    header.column.columnDef
                                                        .header,
                                                    header.getContext()
                                                )}
                                            </TableHead>
                                        ))}
                                    </TableRow>
                                ))}
                            </TableHeader>
                            <TableBody>
                                {table.getRowModel().rows.map((row) => (
                                    <TableRow
                                        key={row.id}
                                        className="hover:bg-gray-50"
                                    >
                                        {row.getVisibleCells().map((cell) => (
                                            <TableCell key={cell.id}>
                                                {flexRender(
                                                    cell.column.columnDef.cell,
                                                    cell.getContext()
                                                )}
                                            </TableCell>
                                        ))}
                                    </TableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </div>

                    {/* Pagination Controls */}
                    <div className="flex items-center justify-between px-2 py-4">
                        <div className="flex items-center gap-2">
                            <p className="text-sm text-gray-700">
                                Rows per page:
                            </p>
                            <Select
                                value={pagination.pageSize.toString()}
                                onValueChange={(value) => {
                                    setPagination((prev) => ({
                                        ...prev,
                                        pageSize: Number(value),
                                        pageIndex: 0,
                                    }));
                                }}
                            >
                                <SelectTrigger className="w-[70px]">
                                    <SelectValue>
                                        {pagination.pageSize}
                                    </SelectValue>
                                </SelectTrigger>
                                <SelectContent>
                                    {[10, 20, 30, 40, 50].map((pageSize) => (
                                        <SelectItem
                                            key={pageSize}
                                            value={pageSize.toString()}
                                        >
                                            {pageSize}
                                        </SelectItem>
                                    ))}
                                </SelectContent>
                            </Select>
                        </div>

                        <div className="flex items-center gap-2">
                            <p className="text-sm text-gray-700">
                                Page {pagination.pageIndex + 1} of{" "}
                                {pagination.pageCount}
                            </p>
                            <div className="flex items-center gap-2">
                                <Button
                                    variant="outline"
                                    size="sm"
                                    onClick={() =>
                                        setPagination((prev) => ({
                                            ...prev,
                                            pageIndex: prev.pageIndex - 1,
                                        }))
                                    }
                                    disabled={pagination.pageIndex === 0}
                                >
                                    <ChevronLeft className="h-4 w-4" />
                                </Button>
                                <Button
                                    variant="outline"
                                    size="sm"
                                    onClick={() =>
                                        setPagination((prev) => ({
                                            ...prev,
                                            pageIndex: prev.pageIndex + 1,
                                        }))
                                    }
                                    disabled={
                                        pagination.pageIndex >=
                                        pagination.pageCount - 1
                                    }
                                >
                                    <ChevronRight className="h-4 w-4" />
                                </Button>
                            </div>
                        </div>
                    </div>
                </CardContent>
            </Card>
        </div>
    );
};

const rootElement = document.getElementById("all-websites");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<WebsitesTable />);
}

export default WebsitesTable;
