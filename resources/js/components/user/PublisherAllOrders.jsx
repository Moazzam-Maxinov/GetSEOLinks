import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import axios from "axios";
import {
    flexRender,
    getCoreRowModel,
    getPaginationRowModel,
    getFilteredRowModel,
    getSortedRowModel,
    useReactTable,
} from "@tanstack/react-table";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { ArrowUpDown } from "lucide-react";

const PublisherAllOrders = () => {
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);
    const [sorting, setSorting] = useState([]);
    const [globalFilter, setGlobalFilter] = useState({
        search: "",
        status: "all",
        minPrice: "",
        maxPrice: "",
        startDate: "",
        endDate: "",
    });

    const getStatusStyles = (status) => {
        switch (status.toLowerCase()) {
            case "pending":
                return "bg-yellow-100 text-yellow-800";
            case "approved":
                return "bg-green-100 text-green-800";
            case "rejected":
                return "bg-red-100 text-red-800";
            case "completed":
                return "bg-green-600 text-white";
            case "inprogress":
                return "bg-green-100 text-green-800";
            default:
                return "bg-yellow-100 text-yellow-800";
        }
    };

    useEffect(() => {
        const fetchOrders = async () => {
            try {
                const response = await axios.get("/api/publisher/orders");
                setOrders(response.data);
            } catch (error) {
                console.error("Error fetching orders:", error);
            } finally {
                setLoading(false);
            }
        };

        fetchOrders();
    }, []);

    const handleFilterChange = (key, value) => {
        setGlobalFilter((prev) => ({ ...prev, [key]: value }));
    };

    const resetFilters = () => {
        setGlobalFilter({
            search: "",
            status: "all",
            minPrice: "",
            maxPrice: "",
            startDate: "",
            endDate: "",
        });
        setSorting([]);
    };

    const columns = [
        {
            accessorKey: "site_details",
            header: "Site Details",
            cell: ({ row }) => (
                <div>
                    <div className="font-medium">{row.original.site_name}</div>
                    <div className="text-sm text-muted-foreground">
                        <a
                            href={row.original.site_url}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="text-blue-600 hover:underline"
                        >
                            {row.original.site_url}
                        </a>
                    </div>
                </div>
            ),
        },
        {
            accessorKey: "link_details",
            header: "Link Details",
            cell: ({ row }) => (
                <div>
                    <div className="font-medium">{row.original.link_text}</div>
                    <div className="text-sm text-muted-foreground">
                        <a
                            href={row.original.requested_url}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="text-blue-600 hover:underline"
                        >
                            {row.original.requested_url}
                        </a>
                    </div>
                </div>
            ),
        },
        {
            accessorKey: "price",
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() => column.toggleSorting()}
                        className="px-0 font-semibold"
                    >
                        Price
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => (
                <div className="font-medium text-green-600">
                    ${parseFloat(row.original.price).toFixed(2)}
                </div>
            ),
        },
        {
            accessorKey: "status",
            header: "Status",
            cell: ({ row }) => (
                <span
                    className={`inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium ${getStatusStyles(
                        row.original.status
                    )}`}
                >
                    {row.original.status}
                </span>
            ),
        },
        {
            accessorKey: "notes",
            header: "Notes",
            cell: ({ row }) => (
                <div className="max-w-xs truncate" title={row.original.notes}>
                    {row.original.notes}
                </div>
            ),
        },
        {
            accessorKey: "created_at",
            header: ({ column }) => {
                return (
                    <Button
                        variant="ghost"
                        onClick={() => column.toggleSorting()}
                        className="px-0 font-semibold"
                    >
                        Created
                        <ArrowUpDown className="ml-2 h-4 w-4" />
                    </Button>
                );
            },
            cell: ({ row }) => {
                const date = new Date(
                    row.original.created_at
                ).toLocaleDateString("en-US", {
                    year: "numeric",
                    month: "short",
                    day: "numeric",
                });
                return <div>{date}</div>;
            },
        },
        {
            accessorKey: "actions",
            header: "Actions",
            cell: ({ row }) => (
                <div className="flex justify-center">
                    <a
                        variant="default"
                        size="sm"
                        href={`/publisher/orders/manage-order?orderId=${row.original.id}`}
                        className="bg-blue-600 hover:bg-blue-700"
                    >
                        Manage Orders
                    </a>
                </div>
            ),
        },
    ];

    const fuzzyFilter = (row, columnId, filterValue) => {
        const { search, status, minPrice, maxPrice, startDate, endDate } =
            filterValue;

        // Text search across multiple fields
        const searchMatch =
            !search ||
            [
                row.original.site_name,
                row.original.link_text,
                row.original.notes,
            ].some((value) =>
                value?.toLowerCase().includes(search.toLowerCase())
            );

        // Status filter
        const statusMatch =
            status === "all" ||
            row.original.status.toLowerCase() === status.toLowerCase();

        // Price range filter
        const price = parseFloat(row.original.price);
        const minPriceMatch = !minPrice || price >= parseFloat(minPrice);
        const maxPriceMatch = !maxPrice || price <= parseFloat(maxPrice);

        // Date range filter
        const date = new Date(row.original.created_at);
        const startDateMatch = !startDate || date >= new Date(startDate);
        const endDateMatch = !endDate || date <= new Date(endDate);

        return (
            searchMatch &&
            statusMatch &&
            minPriceMatch &&
            maxPriceMatch &&
            startDateMatch &&
            endDateMatch
        );
    };

    const table = useReactTable({
        data: orders,
        columns,
        getCoreRowModel: getCoreRowModel(),
        getPaginationRowModel: getPaginationRowModel(),
        getFilteredRowModel: getFilteredRowModel(),
        getSortedRowModel: getSortedRowModel(),
        globalFilterFn: fuzzyFilter,
        state: {
            globalFilter,
            sorting,
        },
        onGlobalFilterChange: setGlobalFilter,
        onSortingChange: setSorting,
        initialState: {
            pagination: {
                pageSize: 5,
            },
        },
    });

    if (loading) {
        return (
            <Card className="w-full">
                <CardContent className="p-6 text-center">
                    Loading orders...
                </CardContent>
            </Card>
        );
    }
    return (
        <Card className="w-full">
            <CardHeader>
                <CardTitle className="text-2xl font-bold text-primary">
                    New Publisher Orders
                </CardTitle>
            </CardHeader>
            <CardContent>
                {/* Filters Section */}
                <div className="mb-6">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        {/* Text Search */}
                        <div className="space-y-2">
                            <Label>Search</Label>
                            <Input
                                placeholder="Search site name, link text..."
                                value={globalFilter.search}
                                onChange={(e) =>
                                    handleFilterChange("search", e.target.value)
                                }
                            />
                        </div>

                        {/* Status Filter */}
                        <div className="space-y-2">
                            <Label>Status</Label>
                            <Select
                                value={globalFilter.status}
                                onValueChange={(value) =>
                                    handleFilterChange("status", value)
                                }
                            >
                                <SelectTrigger>
                                    <SelectValue placeholder="Select status" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="all">All</SelectItem>
                                    <SelectItem value="pending">
                                        Pending
                                    </SelectItem>
                                    <SelectItem value="approved">
                                        Approved
                                    </SelectItem>
                                    <SelectItem value="rejected">
                                        Rejected
                                    </SelectItem>
                                    <SelectItem value="completed">
                                        Completed
                                    </SelectItem>
                                    <SelectItem value="inprogress">
                                        In Progress
                                    </SelectItem>
                                </SelectContent>
                            </Select>
                        </div>

                        {/* Price Range */}
                        <div className="space-y-2">
                            <Label>Price Range</Label>
                            <div className="flex gap-2">
                                <Input
                                    type="number"
                                    placeholder="Min"
                                    value={globalFilter.minPrice}
                                    onChange={(e) =>
                                        handleFilterChange(
                                            "minPrice",
                                            e.target.value
                                        )
                                    }
                                />
                                <Input
                                    type="number"
                                    placeholder="Max"
                                    value={globalFilter.maxPrice}
                                    onChange={(e) =>
                                        handleFilterChange(
                                            "maxPrice",
                                            e.target.value
                                        )
                                    }
                                />
                            </div>
                        </div>

                        {/* Date Range */}
                        <div className="space-y-2">
                            <Label>Date Range</Label>
                            <div className="flex gap-2">
                                <Input
                                    type="date"
                                    value={globalFilter.startDate}
                                    onChange={(e) =>
                                        handleFilterChange(
                                            "startDate",
                                            e.target.value
                                        )
                                    }
                                />
                                <Input
                                    type="date"
                                    value={globalFilter.endDate}
                                    onChange={(e) =>
                                        handleFilterChange(
                                            "endDate",
                                            e.target.value
                                        )
                                    }
                                />
                            </div>
                        </div>

                        {/* Reset Filters Button - Now in the grid */}
                        <div className="space-y-2">
                            <Label>&nbsp;</Label>{" "}
                            {/* Empty label to align with other filters */}
                            <Button
                                variant="outline"
                                onClick={resetFilters}
                                className="w-full"
                            >
                                Reset Filters
                            </Button>
                        </div>
                    </div>
                </div>

                {/* Table Section */}
                <div className="rounded-md border">
                    <Table>
                        <TableHeader>
                            {table.getHeaderGroups().map((headerGroup) => (
                                <TableRow key={headerGroup.id}>
                                    {headerGroup.headers.map((header) => (
                                        <TableHead key={header.id}>
                                            {header.isPlaceholder
                                                ? null
                                                : flexRender(
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
                            {table.getRowModel().rows?.length ? (
                                table.getRowModel().rows.map((row) => (
                                    <TableRow key={row.id}>
                                        {row.getVisibleCells().map((cell) => (
                                            <TableCell key={cell.id}>
                                                {flexRender(
                                                    cell.column.columnDef.cell,
                                                    cell.getContext()
                                                )}
                                            </TableCell>
                                        ))}
                                    </TableRow>
                                ))
                            ) : (
                                <TableRow>
                                    <TableCell
                                        colSpan={columns.length}
                                        className="h-24 text-center"
                                    >
                                        No orders found.
                                    </TableCell>
                                </TableRow>
                            )}
                        </TableBody>
                    </Table>
                </div>

                <div className="flex items-center justify-between space-x-2 py-4">
                    <div className="flex-1 text-sm text-muted-foreground">
                        Page {table.getState().pagination.pageIndex + 1} of{" "}
                        {table.getPageCount()}
                    </div>
                    <div className="flex items-center space-x-2">
                        <Button
                            variant="outline"
                            size="sm"
                            onClick={() => table.previousPage()}
                            disabled={!table.getCanPreviousPage()}
                        >
                            Previous
                        </Button>
                        <Button
                            variant="outline"
                            size="sm"
                            onClick={() => table.nextPage()}
                            disabled={!table.getCanNextPage()}
                        >
                            Next
                        </Button>
                    </div>
                </div>
            </CardContent>
        </Card>
    );
};

const rootElement = document.getElementById("publisher-all-orders");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<PublisherAllOrders />);
}

export default PublisherAllOrders;
