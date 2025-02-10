// FiltersBar.jsx
import React, { useState, useEffect } from "react";
import { useWebsites } from "./WebsitesContext";
import { Search } from "lucide-react";
import MultiSelect from "./MultiSelect"; // Import the new component

const FiltersBar = () => {
    const { categories, filters, setFilters } = useWebsites();
    const [localFilters, setLocalFilters] = useState({
        search: "",
        categories: [],
        trafficRange: null,
        drRange: null,
        daRange: null,
        priceRange: null,
    });

    // Sync localFilters with filters from context when filters change
    useEffect(() => {
        setLocalFilters((prev) => ({
            ...prev,
            ...filters,
        }));
    }, [filters]);

    const handleApplyFilters = () => {
        // Make sure we're using the most up-to-date localFilters
        setFilters((prev) => ({
            ...prev,
            ...localFilters,
            page: 1,
        }));
    };

    const handleKeyPress = (e) => {
        if (e.key === "Enter") {
            handleApplyFilters();
        }
    };

    const handleCategoryChange = (newCategories) => {
        setLocalFilters((prev) => ({
            ...prev,
            categories: newCategories,
        }));
    };

    return (
        <div className="space-y-4">
            {/* Row of Select Filters */}
            <div className="grid grid-cols-1 md:grid-cols-4 gap-4">
                {/* Categories Select */}
                {/* <div className="relative">
                    <select
                        multiple
                        className="w-full border rounded-lg p-2 h-[42px] appearance-none bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        value={localFilters.categories}
                        onChange={(e) =>
                            setLocalFilters((prev) => ({
                                ...prev,
                                categories: Array.from(
                                    e.target.selectedOptions,
                                    (option) => option.value
                                ),
                            }))
                        }
                        style={{
                            overflow: "hidden",
                            textOverflow: "ellipsis",
                            whiteSpace: "nowrap",
                        }}
                    >
                        {categories.map((category) => (
                            <option key={category.id} value={category.id}>
                                {category.name}
                            </option>
                        ))}
                    </select>
                    <div className="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg
                            className="w-4 h-4 text-gray-400"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fillRule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clipRule="evenodd"
                            />
                        </svg>
                    </div>
                </div> */}
                {/* Replace the old categories select with the new MultiSelect */}
                <MultiSelect
                    options={categories}
                    value={localFilters.categories}
                    onChange={handleCategoryChange}
                    placeholder="Select Categories..."
                />

                {/* Traffic Range Select */}
                <select
                    className="w-full border rounded-lg p-2 h-[42px] appearance-none bg-white focus:ring-2 focus:ring-blue-500"
                    value={JSON.stringify(localFilters.trafficRange)}
                    onChange={(e) =>
                        setLocalFilters((prev) => ({
                            ...prev,
                            trafficRange: JSON.parse(e.target.value),
                        }))
                    }
                >
                    <option value="null">All Traffic</option>
                    <option value='{"min":0,"max":5000}'>0 - 5K</option>
                    <option value='{"min":5000,"max":20000}'>5K - 20K</option>
                    <option value='{"min":20000}'>20K+</option>
                </select>

                {/* DA Range Select */}
                <select
                    className="w-full border rounded-lg p-2 h-[42px] appearance-none bg-white focus:ring-2 focus:ring-blue-500"
                    value={JSON.stringify(localFilters.daRange)}
                    onChange={(e) =>
                        setLocalFilters((prev) => ({
                            ...prev,
                            daRange: JSON.parse(e.target.value),
                        }))
                    }
                >
                    <option value="null">All DA</option>
                    <option value='{"min":0,"max":30}'>0 - 30</option>
                    <option value='{"min":31,"max":50}'>31 - 50</option>
                    <option value='{"min":51,"max":70}'>51 - 70</option>
                    <option value='{"min":71}'>71+</option>
                </select>

                {/* DR Range Select */}
                <select
                    className="w-full border rounded-lg p-2 h-[42px] appearance-none bg-white focus:ring-2 focus:ring-blue-500"
                    value={JSON.stringify(localFilters.drRange)}
                    onChange={(e) =>
                        setLocalFilters((prev) => ({
                            ...prev,
                            drRange: JSON.parse(e.target.value),
                        }))
                    }
                >
                    <option value="null">All DR</option>
                    <option value='{"min":0,"max":30}'>0 - 30</option>
                    <option value='{"min":31,"max":50}'>31 - 50</option>
                    <option value='{"min":51,"max":70}'>51 - 70</option>
                    <option value='{"min":71}'>71+</option>
                </select>
            </div>

            {/* Search Row */}
            <div className="flex gap-4 items-center">
                <div className="relative flex-1">
                    <Search
                        className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                        size={20}
                    />
                    <input
                        type="text"
                        placeholder="Search websites..."
                        className="w-full pl-10 pr-4 py-2 h-[42px] border rounded-lg focus:ring-2 focus:ring-blue-500"
                        value={localFilters.search}
                        onChange={(e) =>
                            setLocalFilters((prev) => ({
                                ...prev,
                                search: e.target.value,
                            }))
                        }
                        onKeyPress={handleKeyPress}
                    />
                </div>
                <button
                    onClick={handleApplyFilters}
                    className="px-6 py-2 h-[42px] bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors whitespace-nowrap"
                >
                    Apply Filters
                </button>
            </div>
        </div>
    );
};

export default FiltersBar;
