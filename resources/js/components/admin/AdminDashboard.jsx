import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import axios from "axios";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { ShoppingCart, PlusCircle, DollarSign, Clock } from "lucide-react";

const AdminDashboard = () => {
    const [data, setData] = useState({
        total_orders: 0,
        new_orders: 0,
        total_amount_spent: 0,
        pending_orders: 0,
    });

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get("/admin/api/dashboarddata");
                setData(response.data);
            } catch (error) {
                console.error("Error fetching dashboard data:", error);
            }
        };

        fetchData();
    }, []);

    const cards = [
        {
            title: "Total Orders",
            value: data.total_orders,
            icon: ShoppingCart,
            color: "bg-blue-500",
            textColor: "text-blue-500",
            url: "/admin/orders",
        },
        {
            title: "New Orders",
            value: data.new_orders,
            icon: PlusCircle,
            color: "bg-green-500",
            textColor: "text-green-500",
            url: "/admin/orders/new",
        },
        {
            title: "Total Amount",
            value: `$${data.total_amount_spent.toLocaleString()}`,
            icon: DollarSign,
            color: "bg-purple-500",
            textColor: "text-purple-500",
            url: "#",
        },
        {
            title: "Inprogress Orders",
            value: data.inprogress_orders,
            icon: Clock,
            color: "bg-orange-500",
            textColor: "text-orange-500",
            url: "admin/orders?status=inprogress",
        },
    ];

    return (
        <div className="p-6">
            <h1 className="text-2xl font-bold mb-6">Admin Dashboard</h1>
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                {cards.map((card, index) => {
                    const Icon = card.icon;
                    return (
                        <a href={card.url}>
                            <Card
                                key={index}
                                className="relative overflow-hidden"
                            >
                                <div
                                    className={`absolute top-0 right-0 w-24 h-24 -mr-8 -mt-8 rounded-full opacity-20 ${card.color}`}
                                />
                                <CardHeader className="flex flex-row items-center justify-between pb-2">
                                    <CardTitle className="text-sm font-medium">
                                        {card.title}
                                    </CardTitle>
                                    <Icon
                                        className={`h-4 w-4 ${card.textColor}`}
                                    />
                                </CardHeader>
                                <CardContent>
                                    <div className="text-2xl font-bold">
                                        {card.value}
                                    </div>
                                </CardContent>
                            </Card>
                        </a>
                    );
                })}
            </div>
        </div>
    );
};

const rootElement = document.getElementById("admin-dashboard");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<AdminDashboard />);
}

export default AdminDashboard;
