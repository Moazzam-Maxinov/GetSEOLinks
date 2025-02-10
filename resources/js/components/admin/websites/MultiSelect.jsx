// MultiSelect.jsx
import React, { useState, useRef, useEffect } from "react";
import { X, ChevronDown } from "lucide-react";

const MultiSelect = ({
    options,
    value,
    onChange,
    placeholder = "Select...",
}) => {
    const [isOpen, setIsOpen] = useState(false);
    const dropdownRef = useRef(null);

    // Close dropdown when clicking outside
    useEffect(() => {
        const handleClickOutside = (event) => {
            if (
                dropdownRef.current &&
                !dropdownRef.current.contains(event.target)
            ) {
                setIsOpen(false);
            }
        };

        document.addEventListener("mousedown", handleClickOutside);
        return () =>
            document.removeEventListener("mousedown", handleClickOutside);
    }, []);

    const handleSelect = (optionId) => {
        const newValue = value.includes(optionId)
            ? value.filter((id) => id !== optionId)
            : [...value, optionId];
        onChange(newValue);
    };

    const getSelectedOptions = () => {
        return options.filter((option) => value.includes(option.id));
    };

    const handleRemoveTag = (e, optionId) => {
        e.stopPropagation();
        const newValue = value.filter((id) => id !== optionId);
        onChange(newValue); // This ensures parent state is updated immediately
    };

    return (
        <div className="relative" ref={dropdownRef}>
            <div
                className="min-h-[42px] w-full border rounded-lg bg-white px-3 py-1.5 cursor-pointer flex flex-wrap items-center gap-2"
                onClick={() => setIsOpen(!isOpen)}
            >
                {getSelectedOptions().length > 0 ? (
                    getSelectedOptions().map((option) => (
                        <span
                            key={option.id}
                            className="bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded-md flex items-center gap-1"
                        >
                            {option.name}
                            <X
                                size={14}
                                className="cursor-pointer hover:text-blue-600"
                                onClick={(e) => handleRemoveTag(e, option.id)}
                            />
                        </span>
                    ))
                ) : (
                    <span className="text-gray-500">{placeholder}</span>
                )}
                <ChevronDown
                    size={20}
                    className={`ml-auto transform transition-transform ${
                        isOpen ? "rotate-180" : ""
                    }`}
                />
            </div>

            {isOpen && (
                <div className="absolute z-10 w-full mt-1 bg-white border rounded-lg shadow-lg max-h-60 overflow-auto">
                    {options.map((option) => (
                        <div
                            key={option.id}
                            className={`px-4 py-2 cursor-pointer hover:bg-gray-50 ${
                                value.includes(option.id) ? "bg-blue-50" : ""
                            }`}
                            onClick={() => handleSelect(option.id)}
                        >
                            {option.name}
                        </div>
                    ))}
                </div>
            )}
        </div>
    );
};

export default MultiSelect;
