import ReactDOM from "react-dom/client";
import React, { useEffect, useState, useRef } from "react";
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
import { Input } from "@/components/ui/input";

const WebsitesTableWithFilter = ({ initialCategories }) => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [selectedCategory, setSelectedCategory] = useState("");
    const [searchQuery, setSearchQuery] = useState("");
    const searchFormRef = useRef(null);
    const [formValues, setFormValues] = useState({
        traffic: { min: "0", max: "1000000" },
        da: { min: "0", max: "100" },
        dr: { min: "0", max: "100" },
        price: { min: "0", max: "10000" },
    });
    const [activeFilters, setActiveFilters] = useState({
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
    const columns = [
        {
            accessorKey: "name",
            header: "Website Details",
            cell: ({ row }) => {
                const website = row.original;
                return (
                    <div className="space-y-2">
                        <div className="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1">
                            <a href={website.masked_url} target="_blank">
                                {website.masked_url}
                            </a>
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
            header: "Website Categories",
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
            header: "Monthly Traffic (Ahrefs)",
            cell: ({ getValue }) => getValue()?.toLocaleString(),
        },
        {
            accessorKey: "domain_authority",
            header: "DA (MOZ)",
        },
        {
            accessorKey: "domain_rating",
            header: "DR (Ahrefs)",
        },
        {
            accessorKey: "price",
            header: "Price ($)",
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
                            (window.location.href = `/websites/buy-link?site=${row.original.id}`)
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
            const response = await axios.get("/api/getAllWebsitesDashboard", {
                params: {
                    page: pagination.pageIndex + 1,
                    perPage: pagination.pageSize,
                    filters: activeFilters,
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
    }, [pagination.pageIndex, pagination.pageSize, activeFilters]);

    const table = useReactTable({
        data,
        columns,
        getCoreRowModel: getCoreRowModel(),
        manualPagination: true,
        pageCount: pagination.pageCount,
    });

    const handleCategoryChange = (value) => {
        setSelectedCategory(value);

        // Create new filters with the updated category
        const newFilters = {
            ...activeFilters,
            categories: value ? [value] : [],
        };

        setActiveFilters(newFilters);
        setPagination((prev) => ({
            ...prev,
            pageIndex: 0,
        }));
    };

    const handleSearch = (e) => {
        e.preventDefault();
        const form = e.target;
        const newFormValues = {
            traffic: {
                min: form.trafficMin.value,
                max: form.trafficMax.value,
            },
            da: {
                min: form.daMin.value,
                max: form.daMax.value,
            },
            dr: {
                min: form.drMin.value,
                max: form.drMax.value,
            },
            price: {
                min: form.priceMin.value,
                max: form.priceMax.value,
            },
        };

        setFormValues(newFormValues);

        const newFilters = {
            categories: selectedCategory ? [selectedCategory] : [],
            traffic: {
                min: parseInt(newFormValues.traffic.min) || 0,
                max: parseInt(newFormValues.traffic.max) || 1000000,
            },
            da: {
                min: parseInt(newFormValues.da.min) || 0,
                max: parseInt(newFormValues.da.max) || 100,
            },
            dr: {
                min: parseInt(newFormValues.dr.min) || 0,
                max: parseInt(newFormValues.dr.max) || 100,
            },
            price: {
                min: parseInt(newFormValues.price.min) || 0,
                max: parseInt(newFormValues.price.max) || 10000,
            },
        };

        setActiveFilters(newFilters);
        setPagination((prev) => ({
            ...prev,
            pageIndex: 0,
        }));
    };

    const handleReset = () => {
        const defaultValues = {
            traffic: { min: "0", max: "1000000" },
            da: { min: "0", max: "100" },
            dr: { min: "0", max: "100" },
            price: { min: "0", max: "10000" },
        };

        setFormValues(defaultValues);
        setSelectedCategory("");
        setActiveFilters({
            categories: [],
            traffic: { min: 0, max: 1000000 },
            da: { min: 0, max: 100 },
            dr: { min: 0, max: 100 },
            price: { min: 0, max: 10000 },
        });
    };

    const FilterCard = () => (
        <Card className="mb-6  border-t-4 shadow">
            <CardHeader>
                <CardTitle className="text-lg flex items-center gap-2">
                    <Filter className="w-5 h-5" />
                    Filter Your Options{" "}
                    <span
                        className="text-sm text-gray-600 italic font-normal "
                        style={{ marginTop: "1px" }}
                    >
                        (Use these filters to quickly search for a website as
                        per your requirements)
                    </span>
                </CardTitle>
            </CardHeader>
            <CardContent>
                <form onSubmit={handleSearch} ref={searchFormRef}>
                    <div className="flex items-center justify-between gap-4">
                        {/* Categories Filter */}
                        <div className="space-y-2">
                            <label className="text-sm font-medium">
                                Website Categories
                            </label>
                            <Select
                                value={selectedCategory}
                                onValueChange={handleCategoryChange}
                            >
                                <SelectTrigger className="w-96">
                                    <SelectValue placeholder="Select a category" />
                                </SelectTrigger>
                                <SelectContent>
                                    {initialCategories.map((category) => (
                                        <SelectItem
                                            key={category.id}
                                            value={category.id}
                                        >
                                            {category.name}
                                        </SelectItem>
                                    ))}
                                </SelectContent>
                            </Select>
                        </div>

                        {/* Traffic Filter */}
                        <div className="space-y-2 pl-4">
                            <label className="text-sm font-medium">
                                Monthly Traffic (Ahrefs)
                            </label>
                            <div className="flex gap-2">
                                <Input
                                    type="number"
                                    name="trafficMin"
                                    defaultValue={formValues.traffic.min}
                                    className="w-20"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    name="trafficMax"
                                    defaultValue={formValues.traffic.max}
                                    className="w-20"
                                    placeholder="Max"
                                />
                            </div>
                        </div>

                        {/* DA Filter */}
                        <div className="space-y-2 pl-4">
                            <label className="text-sm font-medium">
                                DA (MOZ)
                            </label>
                            <div className="flex gap-2">
                                <Input
                                    type="number"
                                    name="daMin"
                                    defaultValue={formValues.da.min}
                                    className="w-20"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    name="daMax"
                                    defaultValue={formValues.da.max}
                                    className="w-20"
                                    placeholder="Max"
                                />
                            </div>
                        </div>

                        {/* DR Filter */}
                        <div className="space-y-2 pl-4">
                            <label className="text-sm font-medium">
                                DR (Ahrefs)
                            </label>
                            <div className="flex gap-2">
                                <Input
                                    type="number"
                                    name="drMin"
                                    defaultValue={formValues.dr.min}
                                    className="w-20"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    name="drMax"
                                    defaultValue={formValues.dr.max}
                                    className="w-20"
                                    placeholder="Max"
                                />
                            </div>
                        </div>

                        {/* Price Filter */}
                        <div className="space-y-2 pl-4">
                            <label className="text-sm font-medium">
                                Price ($)
                            </label>
                            <div className="flex gap-2">
                                <Input
                                    type="number"
                                    name="priceMin"
                                    defaultValue={formValues.price.min}
                                    className="w-20"
                                    placeholder="Min"
                                />
                                <Input
                                    type="number"
                                    name="priceMax"
                                    defaultValue={formValues.price.max}
                                    className="w-20"
                                    placeholder="Max"
                                />
                            </div>
                        </div>
                    </div>
                    <div className="flex items-end gap-x-4">
                        <Button type="submit" className="ml-auto mt-7">
                            Search
                        </Button>
                        <Button
                            type="button"
                            variant="destructive"
                            className="mt-7"
                            onClick={handleReset}
                        >
                            Reset Filters
                        </Button>
                    </div>
                </form>
            </CardContent>
        </Card>
    );

    if (loading) {
        return (
            <Card className="w-full shadow">
                <CardContent className="p-6">
                    <div className="flex justify-center items-center min-h-[200px]">
                        <div className="animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
                        <div className="block italic text-gray-600">
                            &nbsp;&nbsp;Loading, please wait...
                        </div>
                    </div>
                </CardContent>
            </Card>
        );
    }

    return (
        <div>
            <FilterCard />
            <Card className="w-full border-t-4 shadow">
                {/* <CardHeader>
                    <CardTitle>Choose a Website for Your Order</CardTitle>
                </CardHeader> */}
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

export default WebsitesTableWithFilter;
