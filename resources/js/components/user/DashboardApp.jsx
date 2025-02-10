import ReactDOM from "react-dom/client";
import React, { useState, useEffect } from "react";
import VendorDashboard from "./VendorDashboard";
import PublisherDashboard from "./PublisherDashboard";
import axios from "axios"; // For API calls
import Cookies from "js-cookie"; // For cookie management

const DashboardApp = () => {
    const [role, setRole] = useState("vendor"); // Default role

    useEffect(() => {
        // Check if the role cookie exists
        let savedRole = Cookies.get("role");
        if (!savedRole) {
            // If no cookie, set default role to "vendor"
            Cookies.set("role", "vendor");
            savedRole = "vendor";
        }
        setRole(savedRole); // Set the role state

        // Fetch data for the current role
        fetchData(savedRole);
    }, []);

    const fetchData = (currentRole) => {
        axios
            .get(`/api/dashboard-data`, { params: { role: currentRole } })
            .then((response) => {
                console.log("Data fetched:", response.data);
                // Handle the data based on the role
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
    };

    const handleToggle = () => {
        // Toggle the role
        const newRole = role === "vendor" ? "publisher" : "vendor";
        Cookies.set("role", newRole); // Update the role cookie
        setRole(newRole); // Update the role state
        fetchData(newRole); // Fetch data for the new role
    };

    return (
        <div>
            <button onClick={handleToggle}>
                Switch to {role === "vendor" ? "Publisher" : "Vendor"}
            </button>
            {role === "vendor" ? <VendorDashboard /> : <PublisherDashboard />}
        </div>
    );
};

const rootElement = document.getElementById("vendor-dashbord");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<DashboardApp />);
}

export default DashboardApp;
