import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import axios from "axios";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { ShoppingCart, PlusCircle, DollarSign, Clock } from "lucide-react";

const PublisherDashboard = () => {
    console.log("Publisher");
    const [data, setData] = useState({
        total_orders: 0,
        new_orders: 0,
        total_amount_spent: 0,
        pending_orders: 0,
    });

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get("/api/publisher-data");
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
        },
        {
            title: "New Orders",
            value: data.new_orders,
            icon: PlusCircle,
            color: "bg-green-500",
            textColor: "text-green-500",
        },
        {
            title: "Total Amount",
            value: `$${data.total_amount_spent.toLocaleString()}`,
            icon: DollarSign,
            color: "bg-purple-500",
            textColor: "text-purple-500",
        },
        {
            title: "Inprogress Orders",
            value: data.inprogress_orders,
            icon: Clock,
            color: "bg-orange-500",
            textColor: "text-orange-500",
        },
    ];

    return (
        <div className="p-6">
            <h1 className="text-2xl font-bold mb-6">Publisher Dashboard</h1>
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                {cards.map((card, index) => {
                    const Icon = card.icon;
                    return (
                        <a href="/publisher/orders/new">
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

const rootElement = document.getElementById("publisher-dashboard");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<PublisherDashboard />);
}

export default PublisherDashboard;
