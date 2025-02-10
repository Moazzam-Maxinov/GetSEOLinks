import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import axios from "axios";
import {
    flexRender,
    getCoreRowModel,
    useReactTable,
} from "@tanstack/react-table";
import {
    ExternalLink,
    Eye,
    ChevronLeft,
    ChevronRight,
    ShoppingCart,
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

const WebsitesTable = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [pagination, setPagination] = useState({
        pageIndex: 0,
        pageSize: 10,
        pageCount: 0,
        total: 0,
    });

    const columns = [
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
    }, [pagination.pageIndex, pagination.pageSize]);

    const table = useReactTable({
        data,
        columns,
        getCoreRowModel: getCoreRowModel(),
        manualPagination: true,
        pageCount: pagination.pageCount,
    });

    if (loading) {
        return (
            <Card className="w-full">
                <CardContent className="p-6">
                    <div className="flex justify-center items-center min-h-[200px]">
                        <div className="animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
                    </div>
                </CardContent>
            </Card>
        );
    }

    return (
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
                                                header.column.columnDef.header,
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
                        <p className="text-sm text-gray-700">Rows per page:</p>
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
                                <SelectValue>{pagination.pageSize}</SelectValue>
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
    );
};

const rootElement = document.getElementById("all-websites");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<WebsitesTable />);
}

export default WebsitesTable;
