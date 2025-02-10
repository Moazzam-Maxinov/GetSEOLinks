import ReactDOM from "react-dom/client";
import React, { useState, useEffect } from "react";
import { Button } from "@/components/ui/button"; // Import shadcn button
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogDescription,
} from "@/components/ui/dialog"; // Import shadcn modal components

const RoleToggleSwitch = () => {
    const [role, setRole] = useState("vendor"); // Default role
    const [isModalOpen, setIsModalOpen] = useState(false);

    // Fetch the initial role from the data-role attribute in the header
    useEffect(() => {
        const navElement = document.querySelector("nav[data-role]");
        if (navElement) {
            const initialRole = navElement.getAttribute("data-role");
            setRole(initialRole);
        }
    }, []);

    const handleToggle = async () => {
        const newRole = role === "vendor" ? "publisher" : "vendor";

        // Open the modal to confirm the switch
        setIsModalOpen(true);

        // Send a POST request to switch the role
        try {
            const response = await fetch("/api/switch-role", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content, // CSRF token
                },
                body: JSON.stringify({ role: newRole }),
            });

            const data = await response.json();

            if (data.success) {
                // Update the role state and reload the page
                setRole(newRole);
                window.location.reload();
            } else {
                console.error("Failed to switch role:", data.error);
            }
        } catch (error) {
            console.error("Error:", error);
        }
    };

    return (
        <>
            <label className="relative inline-flex items-center cursor-pointer">
                <input
                    type="checkbox"
                    className="sr-only peer"
                    checked={role === "publisher"}
                    onChange={handleToggle}
                />
                <div className="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span className="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {role === "vendor" ? "Vendor" : "Publisher"}
                </span>
            </label>

            {/* Shadcn Modal */}
            <Dialog open={isModalOpen} onOpenChange={setIsModalOpen}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Switch Role</DialogTitle>
                        <DialogDescription>
                            Are you sure you want to switch to{" "}
                            {role === "vendor" ? "Publisher" : "Vendor"}?
                        </DialogDescription>
                    </DialogHeader>
                    <div className="flex justify-end space-x-2">
                        <Button
                            variant="outline"
                            onClick={() => setIsModalOpen(false)}
                        >
                            Cancel
                        </Button>
                        <Button
                            onClick={async () => {
                                await handleToggle();
                                setIsModalOpen(false);
                            }}
                        >
                            Confirm
                        </Button>
                    </div>
                </DialogContent>
            </Dialog>
        </>
    );
};

// Self-contained injection logic
const rootElement = document.getElementById("react-toggle-switch");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<RoleToggleSwitch />);
}

export default RoleToggleSwitch;
