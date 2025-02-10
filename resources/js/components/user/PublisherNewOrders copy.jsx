import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import axios from "axios";
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

const PublisherNewOrders = () => {
    const [orders, setOrders] = useState([]);

    useEffect(() => {
        const fetchOrders = async () => {
            try {
                const response = await axios.get("/api/publisher/orders/new");
                setOrders(response.data);
            } catch (error) {
                console.error("Error fetching orders:", error);
            }
        };

        fetchOrders();
    }, []);

    const formatDate = (dateString) => {
        return new Date(dateString).toLocaleDateString("en-US", {
            year: "numeric",
            month: "short",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
        });
    };

    return (
        <Card className="w-full">
            <CardHeader>
                <CardTitle className="text-2xl font-bold text-primary">
                    New Publisher Orders
                </CardTitle>
            </CardHeader>
            <CardContent>
                <div className="rounded-md border">
                    <Table>
                        <TableHeader>
                            <TableRow className="bg-muted text-base">
                                <TableHead>Site Details</TableHead>
                                <TableHead>Link Details</TableHead>
                                <TableHead>Price</TableHead>
                                <TableHead>Status</TableHead>
                                <TableHead>Notes</TableHead>
                                <TableHead>Created</TableHead>
                                <TableHead>Actions</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {orders.map((order) => (
                                <TableRow key={order.id}>
                                    <TableCell>
                                        <div className="font-medium text-base">
                                            {order.site_name}
                                        </div>
                                        <div className="text-base text-muted-foreground">
                                            <a
                                                href={order.site_url}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="text-blue-600 hover:underline"
                                            >
                                                {order.site_url}
                                            </a>
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        <div className="font-medium text-base">
                                            {order.link_text}
                                        </div>
                                        <div className="text-base text-muted-foreground">
                                            <a
                                                href={order.requested_url}
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                className="text-blue-600 hover:underline"
                                            >
                                                {order.requested_url}
                                            </a>
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        <div className="font-medium text-base text-green-600">
                                            $
                                            {parseFloat(order.price).toFixed(2)}
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        <span className="inline-flex items-center rounded-full px-2.5 py-0.5 text-base font-medium bg-yellow-100 text-yellow-800">
                                            {order.status}
                                        </span>
                                    </TableCell>
                                    <TableCell>
                                        <div
                                            className="max-w-xs truncate text-base"
                                            title={order.notes}
                                        >
                                            {order.notes}
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        <span className="text-base">
                                            {formatDate(order.created_at)}
                                        </span>
                                    </TableCell>
                                    <TableCell>
                                        <div className="flex space-x-2">
                                            <Button
                                                variant="destructive"
                                                size="sm"
                                                onClick={() => {}}
                                                className="bg-red-600 hover:bg-red-700"
                                            >
                                                Reject
                                            </Button>
                                            <Button
                                                variant="default"
                                                size="sm"
                                                onClick={() => {}}
                                                className="bg-green-600 hover:bg-green-700"
                                            >
                                                Complete
                                            </Button>
                                        </div>
                                    </TableCell>
                                </TableRow>
                            ))}
                        </TableBody>
                    </Table>
                </div>
            </CardContent>
        </Card>
    );
};

const rootElement = document.getElementById("publisher-new-orders");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<PublisherNewOrders />);
}

export default PublisherNewOrders;
