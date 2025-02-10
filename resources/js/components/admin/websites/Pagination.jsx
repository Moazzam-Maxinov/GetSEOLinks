// New Pagination.jsx component
import React from "react";
import { useWebsites } from "./WebsitesContext";

const Pagination = () => {
    const { pagination, filters, setFilters } = useWebsites();

    if (pagination.last_page <= 1) return null;

    const handlePageChange = (page) => {
        setFilters((prev) => ({ ...prev, page }));
    };

    const renderPageNumbers = () => {
        const pages = [];
        for (let i = 1; i <= pagination.last_page; i++) {
            pages.push(
                <button
                    key={i}
                    onClick={() => handlePageChange(i)}
                    className={`px-3 py-1 mx-1 rounded ${
                        pagination.current_page === i
                            ? "bg-blue-600 text-white"
                            : "bg-gray-200 hover:bg-gray-300"
                    }`}
                >
                    {i}
                </button>
            );
        }
        return pages;
    };

    return (
        <div className="flex justify-between items-center mt-4 px-4">
            <div className="text-sm text-gray-700">
                Showing{" "}
                {(pagination.current_page - 1) * pagination.per_page + 1} to{" "}
                {Math.min(
                    pagination.current_page * pagination.per_page,
                    pagination.total
                )}{" "}
                of {pagination.total} results
            </div>
            <div className="flex space-x-2">
                <button
                    onClick={() =>
                        handlePageChange(pagination.current_page - 1)
                    }
                    disabled={pagination.current_page === 1}
                    className={`px-3 py-1 rounded ${
                        pagination.current_page === 1
                            ? "bg-gray-100 text-gray-400 cursor-not-allowed"
                            : "bg-gray-200 hover:bg-gray-300"
                    }`}
                >
                    Previous
                </button>
                {renderPageNumbers()}
                <button
                    onClick={() =>
                        handlePageChange(pagination.current_page + 1)
                    }
                    disabled={pagination.current_page === pagination.last_page}
                    className={`px-3 py-1 rounded ${
                        pagination.current_page === pagination.last_page
                            ? "bg-gray-100 text-gray-400 cursor-not-allowed"
                            : "bg-gray-200 hover:bg-gray-300"
                    }`}
                >
                    Next
                </button>
            </div>
        </div>
    );
};

export default Pagination;
