import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom/client";
import axios from "axios";
import {
    ExternalLink,
    ChartNoAxesCombinedIcon,
    Link2,
    DollarSign,
    Clock,
    FileText,
    Award,
    Shield,
    Star,
} from "lucide-react";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from "@/components/ui/tooltip";

const WebsiteDetail = () => {
    const [website, setWebsite] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        const id = window.location.pathname.split("/").pop();
        fetchWebsiteDetails(id);
    }, []);

    const fetchWebsiteDetails = async (id) => {
        try {
            const response = await axios.get(`/admin/api/websitedetail/${id}`);
            setWebsite(response.data.data);
            setLoading(false);
        } catch (err) {
            setError("Failed to load website details");
            setLoading(false);
        }
    };

    const getQualityColor = (score) => {
        const colors = {
            1: "text-red-500",
            2: "text-orange-500",
            3: "text-yellow-500",
            4: "text-lime-500",
            5: "text-green-500",
        };
        return colors[score] || "text-gray-400";
    };

    const getQualityLabel = (score) => {
        const labels = {
            1: "Poor",
            2: "Fair",
            3: "Good",
            4: "Very Good",
            5: "Excellent",
        };
        return labels[score] || "Unrated";
    };

    const QualityScore = ({ score }) => (
        <div className="flex flex-col items-center space-y-2">
            <div className="flex space-x-1">
                {[1, 2, 3, 4, 5].map((index) => (
                    <Star
                        key={index}
                        size={24}
                        className={`${
                            index <= score
                                ? getQualityColor(score)
                                : "text-gray-200"
                        } 
                  ${index <= score ? "fill-current" : ""}`}
                    />
                ))}
            </div>
            <span className={`text-sm font-medium ${getQualityColor(score)}`}>
                {getQualityLabel(score)}
            </span>
        </div>
    );

    const StatCard = ({ icon: Icon, title, value, description }) => (
        <Card>
            <CardContent className="pt-6">
                <div className="flex items-start space-x-4">
                    <div className="p-2 bg-blue-100 rounded-lg">
                        <Icon className="h-6 w-6 text-blue-600" />
                    </div>
                    <div>
                        <p className="text-sm font-medium text-gray-500">
                            {title}
                        </p>
                        <h3 className="text-2xl font-bold text-gray-900">
                            {value}
                        </h3>
                        {description && (
                            <p className="text-sm text-gray-500">
                                {description}
                            </p>
                        )}
                    </div>
                </div>
            </CardContent>
        </Card>
    );

    if (loading) {
        return (
            <div className="flex justify-center items-center min-h-[400px]">
                <div className="animate-spin rounded-full h-12 w-12 border-4 border-blue-500 border-t-transparent"></div>
            </div>
        );
    }

    if (error) {
        return <div className="text-center text-red-600 p-4">{error}</div>;
    }

    if (!website) return null;

    return (
        <div className="space-y-6">
            {/* Header Section */}
            <Card className="border-t-4 border-t-blue-500">
                <CardHeader>
                    <div className="flex justify-between items-start">
                        <div>
                            <CardTitle className="text-2xl font-bold">
                                {website.name}
                            </CardTitle>
                            <CardDescription className="flex items-center mt-2">
                                <a
                                    href={website.url}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="text-blue-600 hover:text-blue-800 flex items-center"
                                >
                                    {website.url}{" "}
                                    <ExternalLink className="ml-1 h-4 w-4" />
                                </a>
                            </CardDescription>
                        </div>
                        <QualityScore score={website.quality_score} />
                        <Button
                            variant="outline"
                            onClick={() =>
                                (window.location.href = `/admin/websites/${website.id}/edit`)
                            }
                        >
                            Edit Website
                        </Button>
                    </div>
                </CardHeader>
            </Card>

            {/* Stats Grid */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <StatCard
                    icon={ChartNoAxesCombinedIcon}
                    title="Monthly Traffic"
                    value={website.monthly_traffic?.toLocaleString() || "0"}
                />
                <StatCard
                    icon={Award}
                    title="Domain Authority"
                    value={website.domain_authority || "0"}
                />
                <StatCard
                    icon={Shield}
                    title="Domain Rating"
                    value={website.domain_rating || "0"}
                />
                <StatCard
                    icon={DollarSign}
                    title="Price"
                    value={`$${website.price?.toLocaleString() || "0"}`}
                />
            </div>

            {/* Details Cards */}
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                {/* Link Details */}
                <Card>
                    <CardHeader>
                        <CardTitle>Link Details</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-gray-500">
                                Allowed Link Types
                            </p>
                            <div className="flex flex-wrap gap-2 mt-2">
                                {website.allowed_link_types?.map((type) => (
                                    <Badge key={type} variant="secondary">
                                        {type}
                                    </Badge>
                                ))}
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-gray-500">
                                Max Dofollow Links
                            </p>
                            <p className="text-lg font-semibold">
                                {website.max_dofollow_links}
                            </p>
                        </div>
                    </CardContent>
                </Card>

                {/* Content Requirements */}
                <Card>
                    <CardHeader>
                        <CardTitle>Content Requirements</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-gray-500">
                                Minimum Word Count
                            </p>
                            <p className="text-lg font-semibold">
                                {website.minimum_word_count} words
                            </p>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-gray-500">
                                Language
                            </p>
                            <Badge className="mt-1">{website.language}</Badge>
                        </div>
                    </CardContent>
                </Card>

                {/* Categories */}
                <Card>
                    <CardHeader>
                        <CardTitle>Categories</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="flex flex-wrap gap-2">
                            {website.categories?.map((category) => (
                                <Badge
                                    key={category.id}
                                    variant="default"
                                    className="bg-blue-100 text-blue-800"
                                >
                                    {category.name}
                                </Badge>
                            ))}
                        </div>
                    </CardContent>
                </Card>

                {/* Payment Methods */}
                <Card>
                    <CardHeader>
                        <CardTitle>Payment & Delivery</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div>
                            <p className="text-sm font-medium text-gray-500">
                                Payment Methods
                            </p>
                            <div className="flex flex-wrap gap-2 mt-2">
                                {website.payment_methods?.map((method) => (
                                    <Badge key={method} variant="outline">
                                        {method}
                                    </Badge>
                                ))}
                            </div>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-gray-500">
                                Turnaround Time
                            </p>
                            <p className="text-lg font-semibold">
                                {website.turnaround_time} days
                            </p>
                        </div>
                    </CardContent>
                </Card>

                {/* Guidelines */}
                <Card className="md:col-span-2">
                    <CardHeader>
                        <CardTitle>Content Guidelines</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div className="bg-gray-50 p-4 rounded-lg">
                            <p className="whitespace-pre-wrap">
                                {website.content_guidelines}
                            </p>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>
    );
};

// Mount the component to DOM
const rootElement = document.getElementById("website-detail-app");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<WebsiteDetail />);
}

export default WebsiteDetail;
