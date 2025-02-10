import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom/client";
import axios from "axios";
import {
    AlertCircle,
    Calendar,
    Link2,
    MessageSquare,
    DollarSign,
    Tag,
    Globe,
    Building2,
    CheckCircle2,
} from "lucide-react";

const ManageOrder = () => {
    // State Management
    const [orderDetails, setOrderDetails] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [updateStatus, setUpdateStatus] = useState("");
    const [isUpdating, setIsUpdating] = useState(false);
    const [successMessage, setSuccessMessage] = useState("");
    const [publishedLink, setPublishedLink] = useState("");
    const [publishedLinkError, setPublishedLinkError] = useState("");
    const [rejectionReason, setRejectionReason] = useState("");
    const [rejectionReasonError, setRejectionReasonError] = useState("");

    // Initial Data Fetch
    useEffect(() => {
        const orderId = document.getElementById("orderId")?.value;

        if (orderId) {
            axios
                .get(`/api/getOrderById?orderId=${orderId}`)
                .then((response) => {
                    setOrderDetails(response.data);
                    setUpdateStatus(response.data.status);
                    setPublishedLink(response.data.published_link || "");
                    setRejectionReason(response.data.rejection_reason || "");
                })
                .catch((err) => {
                    setError("Failed to fetch order details.");
                    console.error(err);
                })
                .finally(() => {
                    setLoading(false);
                });
        } else {
            setError("No orderId provided.");
            setLoading(false);
        }
    }, []);

    // Helper Functions
    const validateUrl = (url) => {
        try {
            new URL(url);
            return true;
        } catch {
            return false;
        }
    };

    const formatDate = (dateString) => {
        return new Date(dateString).toLocaleString("en-US", {
            year: "numeric",
            month: "long",
            day: "numeric",
        });
    };

    const getStatusColor = (status) => {
        const statusColors = {
            pending: "bg-yellow-100 text-yellow-800",
            completed: "bg-green-100 text-green-800",
            rejected: "bg-red-100 text-red-800",
            inprogress: "bg-blue-100 text-blue-800",
        };
        return (
            statusColors[status?.toLowerCase()] || "bg-gray-100 text-gray-800"
        );
    };

    // Status Update Handler
    const handleStatusUpdate = async () => {
        // Reset all errors
        setPublishedLinkError("");
        setRejectionReasonError("");
        setError(null);

        // Validate based on status
        if (updateStatus === "completed") {
            if (!publishedLink) {
                setPublishedLinkError(
                    "Published link is required when status is completed"
                );
                return;
            }
            if (!validateUrl(publishedLink)) {
                setPublishedLinkError("Please enter a valid URL");
                return;
            }
        }

        if (updateStatus === "rejected") {
            if (!rejectionReason.trim()) {
                setRejectionReasonError("Rejection reason is required");
                return;
            }
            if (rejectionReason.trim().length < 10) {
                setRejectionReasonError(
                    "Please provide a more detailed rejection reason (minimum 10 characters)"
                );
                return;
            }
        }

        setIsUpdating(true);
        setSuccessMessage("");

        try {
            const payload = {
                orderId: orderDetails.id,
                status: updateStatus,
                published_link:
                    updateStatus === "completed" ? publishedLink : null,
                rejection_reason:
                    updateStatus === "rejected" ? rejectionReason : null,
            };

            const response = await axios.post(
                "/api/publisher/updateOrderStatus",
                payload
            );

            if (response.data.success) {
                setSuccessMessage(response.data.message);
                setOrderDetails(response.data.order);
                setTimeout(() => setSuccessMessage(""), 3000);
            } else {
                setError("Failed to update status. Please try again.");
            }
        } catch (err) {
            setError(
                err.response?.data?.message ||
                    "Failed to update status. Please try again."
            );
        } finally {
            setIsUpdating(false);
        }
    };

    if (loading) {
        return (
            <div className="flex items-center justify-center min-h-[200px]">
                <div className="animate-spin rounded-full h-12 w-12 border-4 border-blue-500 border-t-transparent"></div>
            </div>
        );
    }

    if (error) {
        return (
            <div className="p-4 bg-red-50 rounded-lg">
                <div className="flex items-center">
                    <AlertCircle className="h-5 w-5 text-red-500 mr-2" />
                    <p className="text-red-700">{error}</p>
                </div>
            </div>
        );
    }

    return (
        orderDetails && (
            <div className="max-w-4xl mx-auto p-6">
                {successMessage && (
                    <div className="mb-4 p-4 bg-green-50 rounded-lg">
                        <div className="flex items-center">
                            <CheckCircle2 className="h-5 w-5 text-green-500 mr-2" />
                            <p className="text-green-700">{successMessage}</p>
                        </div>
                    </div>
                )}

                <div className="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div className="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                        <h2 className="text-2xl font-bold text-white flex items-center">
                            <Tag className="mr-2 h-6 w-6" />
                            Order Details
                        </h2>
                    </div>

                    <div className="p-6 border-b space-y-4">
                        <div className="flex flex-wrap items-start gap-4">
                            {/* Status Selection */}
                            <div className="flex-grow">
                                <label
                                    htmlFor="status"
                                    className="block text-sm font-medium text-gray-700 mb-1"
                                >
                                    Update Status
                                </label>
                                <select
                                    id="status"
                                    value={updateStatus}
                                    onChange={(e) => {
                                        setUpdateStatus(e.target.value);
                                        setPublishedLinkError("");
                                        setRejectionReasonError("");
                                    }}
                                    className="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                                    disabled={isUpdating}
                                >
                                    <option value="pending">Pending</option>
                                    <option value="inprogress">
                                        In Progress
                                    </option>
                                    <option value="completed">Completed</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>

                            {/* Published Link Field - Only shown when status is completed */}
                            {updateStatus === "completed" && (
                                <div className="flex-grow">
                                    <label
                                        htmlFor="publishedLink"
                                        className="block text-sm font-medium text-gray-700 mb-1"
                                    >
                                        Published Link{" "}
                                        <span className="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="url"
                                        id="publishedLink"
                                        value={publishedLink}
                                        onChange={(e) => {
                                            setPublishedLink(e.target.value);
                                            setPublishedLinkError("");
                                        }}
                                        placeholder="https://example.com/published-page"
                                        className={`mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 ${
                                            publishedLinkError
                                                ? "border-red-300"
                                                : "border-gray-300"
                                        }`}
                                        required
                                    />
                                    {publishedLinkError && (
                                        <p className="mt-1 text-sm text-red-600">
                                            {publishedLinkError}
                                        </p>
                                    )}
                                </div>
                            )}

                            {/* Rejection Reason Field - Only shown when status is rejected */}
                            {updateStatus === "rejected" && (
                                <div className="flex-grow">
                                    <label
                                        htmlFor="rejectionReason"
                                        className="block text-sm font-medium text-gray-700 mb-1"
                                    >
                                        Rejection Reason{" "}
                                        <span className="text-red-500">*</span>
                                    </label>
                                    <textarea
                                        id="rejectionReason"
                                        value={rejectionReason}
                                        onChange={(e) => {
                                            setRejectionReason(e.target.value);
                                            setRejectionReasonError("");
                                        }}
                                        placeholder="Please provide a detailed reason for rejection..."
                                        rows={3}
                                        className={`mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 ${
                                            rejectionReasonError
                                                ? "border-red-300"
                                                : "border-gray-300"
                                        }`}
                                        required
                                    />
                                    {rejectionReasonError && (
                                        <p className="mt-1 text-sm text-red-600">
                                            {rejectionReasonError}
                                        </p>
                                    )}
                                </div>
                            )}
                        </div>

                        {/* Update Button */}
                        <div className="flex justify-end mt-4">
                            <button
                                onClick={handleStatusUpdate}
                                disabled={
                                    isUpdating ||
                                    updateStatus === orderDetails.status
                                }
                                className="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                {isUpdating ? (
                                    <span className="flex items-center">
                                        <div className="animate-spin rounded-full h-4 w-4 border-2 border-white border-t-transparent mr-2"></div>
                                        Updating...
                                    </span>
                                ) : (
                                    "Update Status"
                                )}
                            </button>
                        </div>
                    </div>

                    {/* Rest of the order details component ... */}
                    {/* Content */}
                    <div className="p-6 space-y-6">
                        {/* Order ID and Status */}
                        <div className="flex flex-wrap justify-between items-center gap-4">
                            <div className="flex items-center space-x-2">
                                <span className="text-gray-500">Order ID:</span>
                                <span className="font-semibold">
                                    #{orderDetails.id}
                                </span>
                            </div>
                            <span
                                className={`px-4 py-2 rounded-full text-sm font-medium ${getStatusColor(
                                    orderDetails.status
                                )}`}
                            >
                                {orderDetails.status}
                            </span>
                        </div>

                        {/* Site Information */}
                        <div className="grid md:grid-cols-2 gap-6 bg-gray-50 p-4 rounded-lg">
                            <div className="space-y-4">
                                <div className="flex items-center">
                                    <Building2 className="h-5 w-5 text-gray-500 mr-2" />
                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Site Name
                                        </p>
                                        <p className="font-medium">
                                            {orderDetails.site_name}
                                        </p>
                                    </div>
                                </div>
                                <div className="flex items-center">
                                    <Globe className="h-5 w-5 text-gray-500 mr-2" />
                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Site URL
                                        </p>
                                        <a
                                            href={orderDetails.site_url}
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            className="text-blue-600 hover:text-blue-800 break-all"
                                        >
                                            {orderDetails.site_url}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div className="space-y-4">
                                <div className="flex items-center">
                                    <Link2 className="h-5 w-5 text-gray-500 mr-2" />
                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Requested URL
                                        </p>
                                        <a
                                            href={orderDetails.requested_url}
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            className="text-blue-600 hover:text-blue-800 break-all"
                                        >
                                            {orderDetails.requested_url}
                                        </a>
                                    </div>
                                </div>
                                <div className="flex items-center">
                                    <DollarSign className="h-5 w-5 text-gray-500 mr-2" />
                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Price
                                        </p>
                                        <p className="font-semibold text-green-600">
                                            ${orderDetails.price}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Link Text */}
                        <div className="bg-gray-50 p-4 rounded-lg">
                            <div className="flex items-start">
                                <Tag className="h-5 w-5 text-gray-500 mr-2 mt-1" />
                                <div>
                                    <p className="text-sm text-gray-500">
                                        Link Text
                                    </p>
                                    <p className="font-medium">
                                        {orderDetails.link_text}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {/* Notes */}
                        {orderDetails.notes && (
                            <div className="bg-gray-50 p-4 rounded-lg">
                                <div className="flex items-start">
                                    <MessageSquare className="h-5 w-5 text-gray-500 mr-2 mt-1" />
                                    <div>
                                        <p className="text-sm text-gray-500">
                                            Notes
                                        </p>
                                        <p className="whitespace-pre-wrap">
                                            {orderDetails.notes}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        )}

                        {/* Created At */}
                        <div className="flex items-center text-sm text-gray-500">
                            <Calendar className="h-4 w-4 mr-1" />
                            Order Placed: {formatDate(orderDetails.created_at)}
                        </div>
                    </div>
                </div>
            </div>
        )
    );
};

const rootElement = document.getElementById("manage-order");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<ManageOrder />);
}

export default ManageOrder;
