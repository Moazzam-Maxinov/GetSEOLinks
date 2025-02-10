// WebsitesContext.jsx
import React, { createContext, useState, useContext } from "react";

const WebsitesContext = createContext();

export const WebsitesProvider = ({ children, initialCategories = [] }) => {
    const [websites, setWebsites] = useState([]);
    const [categories] = useState(initialCategories);
    const [pagination, setPagination] = useState({
        current_page: 1,
        last_page: 1,
        per_page: 10,
        total: 0,
    });
    const [filters, setFilters] = useState({
        search: "",
        categories: [],
        trafficRange: null,
        drRange: null,
        daRange: null, // Add this
        priceRange: null,
        language: "",
        page: 1,
    });
    const [loading, setLoading] = useState(false);

    const value = {
        websites,
        setWebsites,
        categories,
        filters,
        setFilters,
        loading,
        setLoading,
        pagination,
        setPagination,
    };

    return (
        <WebsitesContext.Provider value={value}>
            {children}
        </WebsitesContext.Provider>
    );
};

export const useWebsites = () => {
    return useContext(WebsitesContext);
};
