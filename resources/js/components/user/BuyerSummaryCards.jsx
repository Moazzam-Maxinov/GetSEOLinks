import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import axios from "axios";
import {
    ShoppingCart,
    PlusCircle,
    DollarSign,
    Clock,
    ClockAlert,
} from "lucide-react";

function BuyerSummaryCards() {
    const [data, setData] = useState({
        total_orders: 0,
        pending_orders: 0,
        tasks_pending: 0,
        inprogress_orders: 0,
    });

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get("/api/buyer-summary-data");
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
            subtext: "Total number of orders you have placed",
            url: "/orders",
        },
        {
            title: "Tasks Pending",
            value: data.tasks_pending,
            icon: PlusCircle,
            color: "bg-green-500",
            textColor: "text-green-500",
            subtext:
                "Orders completed by vendors, awaiting your review—accept or reject them.",
            url: "#",
        },
        {
            title: "Pending Orders",
            value: data.pending_orders,
            icon: ClockAlert,
            color: "bg-purple-500",
            textColor: "text-purple-500",
            subtext:
                "Orders that are still under vendor review or waiting to be processed.",
            url: "#",
        },
        {
            title: "Inprogress Orders",
            value: data.inprogress_orders,
            icon: Clock,
            color: "bg-orange-500",
            textColor: "text-orange-500",
            subtext: "Orders currently being processed by vendors.",
            url: "#",
        },
    ];
    return (
        <div className="pb-2">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                {cards.map((card, index) => {
                    const Icon = card.icon;
                    return (
                        <a href={card.url} key={index}>
                            <Card
                                key={index}
                                className="relative overflow-hidden flex flex-col h-full"
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
                                <CardContent className="flex-grow">
                                    <div className="text-2xl font-bold">
                                        {card.value}
                                    </div>
                                    <div className="text-xs mt-4 text-gray-600 italic">
                                        {card.subtext}
                                    </div>
                                </CardContent>
                            </Card>
                        </a>
                    );
                })}
            </div>
        </div>
    );
}

export default BuyerSummaryCards;
