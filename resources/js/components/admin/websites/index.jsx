// index.jsx
import React from "react";
import ReactDOM from "react-dom/client";
import { WebsitesProvider } from "./WebsitesContext";
import WebsitesList from "./WebsitesList";

const WebsitesApp = () => {
    // Get categories from the data attribute
    const rootElement = document.getElementById("websites-app");
    const categories = JSON.parse(rootElement.dataset.categories || "[]");

    return (
        <WebsitesProvider initialCategories={categories}>
            <div className="p-6">
                <h1 className="text-2xl font-bold mb-6">Websites Management</h1>
                <WebsitesList />
            </div>
        </WebsitesProvider>
    );
};

const rootElement = document.getElementById("websites-app");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<WebsitesApp />);
}

export default WebsitesApp;
