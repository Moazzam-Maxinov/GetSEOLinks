// WebsitesTable.jsx
import React from "react";
import { useWebsites } from "./WebsitesContext";

const WebsitesTable = () => {
    const { websites, loading } = useWebsites();

    if (loading) {
        return (
            <div className="text-center py-4">
                <div className="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500 mx-auto"></div>
            </div>
        );
    }

    return (
        <div className="overflow-x-auto rounded-lg shadow">
            <table className="w-full">
                <thead className="bg-gray-50">
                    <tr>
                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            URL
                        </th>
                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Categories
                        </th>
                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Traffic
                        </th>
                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            DA
                        </th>
                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            DR
                        </th>
                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Price
                        </th>
                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody className="bg-white divide-y divide-gray-200">
                    {websites.map((website) => (
                        <tr key={website.id} className="hover:bg-gray-50">
                            <td className="px-6 py-4">
                                <a
                                    href={website.url}
                                    className="text-blue-600 hover:text-blue-800"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title={website.url}
                                >
                                    {website.url.substring(0, 30)}...
                                </a>
                            </td>
                            <td className="px-6 py-4">
                                {website.categories.map((cat) => (
                                    <span
                                        key={cat.id}
                                        className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-2"
                                    >
                                        {cat.name}
                                    </span>
                                ))}
                            </td>
                            <td className="px-6 py-4">
                                {website.monthly_traffic?.toLocaleString()}
                            </td>
                            <td className="px-6 py-4">
                                {website.domain_authority}
                            </td>
                            <td className="px-6 py-4">
                                {website.domain_rating}
                            </td>
                            <td className="px-6 py-4">
                                ${website.price?.toLocaleString()}
                            </td>
                            <td className="px-6 py-4">
                                <button
                                    className="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                                    onClick={() =>
                                        (window.location.href = `/admin/websites/${website.id}`)
                                    }
                                >
                                    View Details
                                </button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default WebsitesTable;
