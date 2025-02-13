import ReactDOM from "react-dom/client";
import React, { useEffect, useState } from "react";
import BuyerSummaryCards from "./BuyerSummaryCards";
import WebsitesTableWithFilter from "./WebsitesTableWithFilter";

function VendorDashboard({ initialCategories }) {
    return (
        <div>
            <BuyerSummaryCards />
            <h1 className="text-4xl pt-5 font-bold text-emerald-600">
                Select a Website for Your Link
            </h1>
            <p class="text-lg text-gray-500 mt-1 mb-3 pb-3">
                Choose from our network the website where you'd like your link
                to be featured.
            </p>
            <WebsitesTableWithFilter initialCategories={initialCategories} />
            <br></br>
        </div>
    );
}

// const rootElement = document.getElementById("vendor-dashboard");
// if (rootElement) {
//     ReactDOM.createRoot(rootElement).render(<VendorDashboard />);
// }

// Render the component
const rootElement = document.getElementById("vendor-dashboard");
if (rootElement) {
    const initialCategories = JSON.parse(
        rootElement.dataset.categories || "[]"
    );
    ReactDOM.createRoot(rootElement).render(
        <VendorDashboard initialCategories={initialCategories} />
    );
}

export default VendorDashboard;
