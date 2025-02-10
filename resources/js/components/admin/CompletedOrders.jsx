import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import axios from "axios";
import {
    flexRender,
    getCoreRowModel,
    getPaginationRowModel,
    useReactTable,
} from "@tanstack/react-table";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";

const CompletedOrders = () => {
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchOrders = async () => {
            try {
                const response = await axios.get("/admin/api/orders/completed");
                setOrders(response.data);
            } catch (error) {
                console.error("Error fetching orders:", error);
            } finally {
                setLoading(false);
            }
        };

        fetchOrders();
    }, []);

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
            case "unreviewed":
                return "bg-orange-300 text-orange-800";
            default:
                return "bg-yellow-100 text-yellow-800";
        }
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
            header: "Price",
            cell: ({ row }) => (
                <div className="font-medium text-green-600">
                    ${parseFloat(row.original.price).toFixed(2)}
                </div>
            ),
        },
        // {
        //     accessorKey: "status",
        //     header: "Status",
        //     cell: ({ row }) => (
        //         <span
        //             className={`inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium ${getStatusStyles(
        //                 row.original.status
        //             )}`}
        //         >
        //             {row.original.status}
        //         </span>
        //     ),
        // },
        {
            accessorKey: "vendor-status",
            header: "Vendor Status",
            cell: ({ row }) => (
                <>
                    <span
                        className={`inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium ${getStatusStyles(
                            row.original.vendor_status || "unreviewed" // Provide a fallback if vendor_status is empty
                        )}`}
                    >
                        {row.original.vendor_status || "unreviewed"}
                    </span>
                </>
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
            header: "Created",
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
                <div className="flex space-x-2">
                    <Button
                        variant="default"
                        size="sm"
                        // href={`/orders/manage-order?orderId=${row.original.id}`}
                        onClick={() => {
                            window.location.href = `/admin/orders/manage-order?orderId=${row.original.id}`;
                        }}
                        className="bg-blue-600 hover:bg-blue-700"
                    >
                        Manage Order
                    </Button>
                    <Button
                        variant="default"
                        size="sm"
                        onClick={() => {
                            window.location.href = `/admin/orders/invoice?invoiceId=${row.original.invoice_id}`;
                        }}
                        className="bg-blue-600 hover:bg-blue-700"
                        disabled={row.original.invoice_id === null} // Disable if invoice_id is null
                    >
                        Invoice
                    </Button>
                </div>
            ),
        },
    ];

    const table = useReactTable({
        data: orders,
        columns,
        getCoreRowModel: getCoreRowModel(),
        getPaginationRowModel: getPaginationRowModel(),
        initialState: {
            pagination: {
                pageSize: 15, //No. of rows to display in single page
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
                    New Admin Orders
                </CardTitle>
            </CardHeader>
            <CardContent>
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

const rootElement = document.getElementById("completed-orders");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<CompletedOrders />);
}

export default CompletedOrders;
