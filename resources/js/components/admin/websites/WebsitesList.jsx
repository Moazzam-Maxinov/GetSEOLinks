// WebsitesList.jsx
import React, { useEffect } from "react";
import { useWebsites } from "./WebsitesContext";
import FiltersBar from "./FiltersBar";
import WebsitesTable from "./WebsitesTable";
import Pagination from "./Pagination";

const WebsitesList = () => {
    const { filters, setWebsites, setLoading, setPagination } = useWebsites();

    // WebsitesList.jsx
    useEffect(() => {
        const fetchWebsites = async () => {
            setLoading(true);
            try {
                // Create an object with all parameters
                const params = {
                    search: filters.search || "",
                    categories: filters.categories.join(","),
                    trafficRange: filters.trafficRange
                        ? JSON.stringify(filters.trafficRange)
                        : "",
                    drRange: filters.drRange
                        ? JSON.stringify(filters.drRange)
                        : "",
                    daRange: filters.daRange
                        ? JSON.stringify(filters.daRange)
                        : "", // Add this
                    priceRange: filters.priceRange
                        ? JSON.stringify(filters.priceRange)
                        : "",
                    page: filters.page || 1,
                };

                // Filter out empty values
                const cleanParams = Object.fromEntries(
                    Object.entries(params).filter(([_, value]) => value !== "")
                );

                const queryString = new URLSearchParams(cleanParams).toString();
                const response = await fetch(`/admin/websites?${queryString}`);

                if (!response.ok) {
                    throw new Error("Failed to fetch websites");
                }

                const data = await response.json();

                if (data.success) {
                    setWebsites(data.websites.data);
                    setPagination({
                        current_page: data.websites.current_page,
                        last_page: data.websites.last_page,
                        per_page: data.websites.per_page,
                        total: data.websites.total,
                    });
                } else {
                    console.error("Error:", data.message);
                }
            } catch (error) {
                console.error("Error fetching websites:", error);
            } finally {
                setLoading(false);
            }
        };

        const timeoutId = setTimeout(() => {
            fetchWebsites();
        }, 300);

        return () => clearTimeout(timeoutId);
    }, [filters]);

    return (
        <div className="space-y-6">
            <FiltersBar />
            <WebsitesTable />
            <Pagination />
        </div>
    );
};

export default WebsitesList;
