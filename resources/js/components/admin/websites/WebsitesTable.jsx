//OldFile.jsx. Sample webistes table. DO NOT use

import React from "react";
import { useWebsites } from "./WebsitesContext";
import { ExternalLink, Edit } from "lucide-react";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Card, CardContent } from "@/components/ui/card";

const WebsitesTable = () => {
    const { websites, loading } = useWebsites();

    if (loading) {
        return (
            <div className="flex justify-center items-center min-h-[200px]">
                <div className="animate-spin rounded-full h-8 w-8 border-4 border-blue-500 border-t-transparent"></div>
            </div>
        );
    }

    return (
        <Card className="w-full text-base shadow-lg">
            <CardContent className="p-6">
                <div className="rounded-md border">
                    <Table>
                        <TableHeader className="bg-slate-100 font-bold">
                            <TableRow>
                                <TableHead className="max-w-36 min-w-36">
                                    Website
                                </TableHead>
                                <TableHead>Categories</TableHead>
                                <TableHead>Traffic</TableHead>
                                <TableHead>DA</TableHead>
                                <TableHead>DR</TableHead>
                                <TableHead>Price</TableHead>
                                <TableHead>Actions</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {websites.map((website) => (
                                <TableRow
                                    key={website.id}
                                    className="hover:bg-gray-50"
                                >
                                    <TableCell className="align-top">
                                        <div className="space-y-2">
                                            <div className="font-medium">
                                                {website.name}
                                            </div>
                                            <a
                                                href={website.url}
                                                className="text-sm text-blue-600 hover:text-blue-800 flex items-center gap-1"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                title={website.url}
                                            >
                                                {website.url}{" "}
                                                <ExternalLink size={14} />
                                            </a>
                                            <div className="flex flex-wrap gap-1">
                                                {website.allowed_link_types.map(
                                                    (type) => (
                                                        <Badge
                                                            key={type}
                                                            varsiant="secondary"
                                                            className="text-xs bg-slate-300 text-gray-700"
                                                        >
                                                            {type}
                                                        </Badge>
                                                    )
                                                )}
                                            </div>
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        <div className="flex flex-wrap gap-1">
                                            {website.categories.map((cat) => (
                                                <Badge
                                                    key={cat.id}
                                                    variant="default"
                                                    className="bg-blue-100 text-blue-800 hover:bg-blue-200"
                                                >
                                                    {cat.name}
                                                </Badge>
                                            ))}
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        {website.monthly_traffic?.toLocaleString()}
                                    </TableCell>
                                    <TableCell>
                                        {website.domain_authority}
                                    </TableCell>
                                    <TableCell>
                                        {website.domain_rating}
                                    </TableCell>
                                    <TableCell>
                                        ${website.price?.toLocaleString()}
                                    </TableCell>
                                    <TableCell>
                                        <div className="flex gap-2">
                                            <Button
                                                variant="outline"
                                                size="sm"
                                                onClick={() =>
                                                    (window.location.href = `/admin/websites/${website.id}/edit`)
                                                }
                                            >
                                                <Edit className="w-4 h-4 mr-1" />
                                                Edit
                                            </Button>
                                            <Button
                                                size="sm"
                                                onClick={() =>
                                                    (window.location.href = `/admin/websites/${website.id}`)
                                                }
                                            >
                                                View
                                            </Button>
                                        </div>
                                    </TableCell>
                                </TableRow>
                            ))}
                        </TableBody>
                    </Table>
                </div>
            </CardContent>
        </Card>
    );
};

export default WebsitesTable;
