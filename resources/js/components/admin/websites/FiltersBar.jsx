import React, { useState, useEffect } from "react";
import { useWebsites } from "./WebsitesContext";
import { Search } from "lucide-react";
import MultiSelect from "./MultiSelect";

import { Card, CardContent } from "@/components/ui/card";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";

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

    useEffect(() => {
        setLocalFilters((prev) => ({
            ...prev,
            ...filters,
        }));
    }, [filters]);

    const handleApplyFilters = () => {
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
        <Card className="w-full shadow-lg">
            <CardContent className="p-6 space-y-6">
                {/* Row of Select Filters */}
                <div className="grid grid-cols-1 md:grid-cols-4 gap-4">
                    {/* Keep existing MultiSelect */}
                    <MultiSelect
                        options={categories}
                        value={localFilters.categories}
                        onChange={handleCategoryChange}
                        placeholder="Select Categories..."
                    />

                    {/* Traffic Range Select */}
                    <Select
                        value={JSON.stringify(localFilters.trafficRange)}
                        onValueChange={(value) =>
                            setLocalFilters((prev) => ({
                                ...prev,
                                trafficRange: JSON.parse(value),
                            }))
                        }
                    >
                        <SelectTrigger className="w-full h-[42px]">
                            <SelectValue placeholder="All Traffic" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="null">All Traffic</SelectItem>
                            <SelectItem value='{"min":0,"max":5000}'>
                                0 - 5K
                            </SelectItem>
                            <SelectItem value='{"min":5000,"max":20000}'>
                                5K - 20K
                            </SelectItem>
                            <SelectItem value='{"min":20000}'>20K+</SelectItem>
                        </SelectContent>
                    </Select>

                    {/* DA Range Select */}
                    <Select
                        value={JSON.stringify(localFilters.daRange)}
                        onValueChange={(value) =>
                            setLocalFilters((prev) => ({
                                ...prev,
                                daRange: JSON.parse(value),
                            }))
                        }
                    >
                        <SelectTrigger className="w-full h-[42px]">
                            <SelectValue placeholder="All DA" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="null">All DA</SelectItem>
                            <SelectItem value='{"min":0,"max":30}'>
                                0 - 30
                            </SelectItem>
                            <SelectItem value='{"min":31,"max":50}'>
                                31 - 50
                            </SelectItem>
                            <SelectItem value='{"min":51,"max":70}'>
                                51 - 70
                            </SelectItem>
                            <SelectItem value='{"min":71}'>71+</SelectItem>
                        </SelectContent>
                    </Select>

                    {/* DR Range Select */}
                    <Select
                        value={JSON.stringify(localFilters.drRange)}
                        onValueChange={(value) =>
                            setLocalFilters((prev) => ({
                                ...prev,
                                drRange: JSON.parse(value),
                            }))
                        }
                    >
                        <SelectTrigger className="w-full h-[42px]">
                            <SelectValue placeholder="All DR" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="null">All DR</SelectItem>
                            <SelectItem value='{"min":0,"max":30}'>
                                0 - 30
                            </SelectItem>
                            <SelectItem value='{"min":31,"max":50}'>
                                31 - 50
                            </SelectItem>
                            <SelectItem value='{"min":51,"max":70}'>
                                51 - 70
                            </SelectItem>
                            <SelectItem value='{"min":71}'>71+</SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                {/* Search Row */}
                <div className="flex gap-4 items-center">
                    <div className="relative flex-1">
                        <Search
                            className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                            size={20}
                        />
                        <Input
                            type="text"
                            placeholder="Search websites..."
                            className="w-full pl-10"
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
                    <Button onClick={handleApplyFilters} className="h-[42px]">
                        Apply Filters
                    </Button>
                </div>
            </CardContent>
        </Card>
    );
};

export default FiltersBar;
