import { Check } from "lucide-react";
import { Button } from "../ui/button";
import { Card, CardContent, CardFooter } from "../ui/card";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "../ui/tabs";

const PricingTab = () => {
    const tabs = ["DA 40", "DA 50", "DA 60", "DA 70", "DA 80"];
    return (
        <Tabs defaultValue="da40" className="space-y-8">
            <div className="flex justify-center">
                <TabsList className="flex gap-2 bg-primary-BG3 rounded-full px-3 py-8 border border-white/50">
                    {tabs.map((tab, index) => (
                        <TabsTrigger
                            key={index}
                            value={`da${40 + index * 10}`}
                            className="px-3 sm:px-5 sm:py-3 rounded-full text-white font-bold transition-all duration-300 data-[state=active]:text-white relative overflow-hidden data-[state=active]:[background:linear-gradient(135.31deg,rgba(255,255,255,0.2)_30.4%,rgba(255,255,255,0)_100%)]"
                        >
                            {tab}
                        </TabsTrigger>
                    ))}
                </TabsList>
            </div>

            {/* Tab Content */}
            <div className="flex justify-center w-full">
                <div className="w-full sm:w-auto">
                    <TabsContent value="da40">
                        <Card className="bg-white/10 backdrop-blur-xl border border-white/50 shadow-sm rounded-xl px-6 sm:px-10 py-6 sm:py-12">
                            <CardContent className="flex flex-col md:flex-row items-start sm:items-center justify-between gap-4 sm:gap-16 p-0">
                                {/* Left Section */}
                                <div>
                                    <p className="text-base bg-white/15 text-white px-2 py-1 rounded-xl inline-block">
                                        <span className="font-semibold">
                                            $45.04
                                        </span>{" "}
                                        one time
                                    </p>
                                    <p className="text-xl text-primary-light mt-6">
                                        From
                                    </p>
                                    <p className="text-6xl font-bold text-primary-light mt-2">
                                        $5.72
                                        <span className="text-xl font-normal">
                                            /Per month
                                        </span>
                                    </p>
                                </div>

                                {/* Right Section */}
                                <div className="flex flex-col items-start gap-y-4">
                                    <div className="flex flex-col gap-y-1">
                                        <p className="flex items-center gap-6 text-white text-xl font-medium">
                                            Index
                                            <span className="bg-primary p-1 rounded-full">
                                                <Check
                                                    className="text-white"
                                                    size={18}
                                                />
                                            </span>
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            DA 40
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            PA 46
                                        </p>
                                    </div>
                                    <div className="flex flex-col gap-y-1">
                                        <p className="text-white text-xl font-medium">
                                            Our Inventory
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            No. of DA40 pages:
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            22939
                                        </p>
                                    </div>
                                </div>
                            </CardContent>
                            <CardFooter className="flex justify-center p-0 mt-6">
                                <Button className="px-6 py-8 bg-primary-light hover:bg-primary text-primary-dark/90 text-xl font-semibold shadow-md rounded-xl w-full">
                                    Get inside
                                </Button>
                            </CardFooter>
                        </Card>
                    </TabsContent>
                    <TabsContent value="da50">
                        <Card className="bg-white/10 backdrop-blur-xl border border-white/50 shadow-sm rounded-xl px-6 sm:px-10 py-6 sm:py-12">
                            <CardContent className="flex flex-col md:flex-row items-start sm:items-center justify-between gap-4 sm:gap-16 p-0">
                                {/* Left Section */}
                                <div>
                                    <p className="text-base bg-white/15 text-white px-2 py-1 rounded-xl inline-block">
                                        <span className="font-semibold">
                                            $50.50
                                        </span>{" "}
                                        one time
                                    </p>
                                    <p className="text-xl text-primary-light mt-6">
                                        From
                                    </p>
                                    <p className="text-6xl font-bold text-primary-light mt-2">
                                        $6.50
                                        <span className="text-xl font-normal">
                                            /Per month
                                        </span>
                                    </p>
                                </div>

                                {/* Right Section */}
                                <div className="flex flex-col items-start gap-y-4">
                                    <div className="flex flex-col gap-y-1">
                                        <p className="flex items-center gap-6 text-white text-xl font-medium">
                                            Index
                                            <span className="bg-primary p-1 rounded-full">
                                                <Check
                                                    className="text-white"
                                                    size={18}
                                                />
                                            </span>
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            DA 50
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            PA 60
                                        </p>
                                    </div>
                                    <div className="flex flex-col gap-y-1">
                                        <p className="text-white text-xl font-medium">
                                            Our Inventory
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            No. of DA50 pages:
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            9104
                                        </p>
                                    </div>
                                </div>
                            </CardContent>
                            <CardFooter className="flex justify-center p-0 mt-6">
                                <Button className="px-6 py-8 bg-primary-light hover:bg-primary text-primary-dark/90 text-xl font-semibold shadow-md rounded-xl w-full">
                                    Get inside
                                </Button>
                            </CardFooter>
                        </Card>
                    </TabsContent>
                    <TabsContent value="da60">
                        <Card className="bg-white/10 backdrop-blur-xl border border-white/50 shadow-sm rounded-xl px-6 sm:px-10 py-6 sm:py-12">
                            <CardContent className="flex flex-col md:flex-row items-start sm:items-center justify-between gap-4 sm:gap-16 p-0">
                                {/* Left Section */}
                                <div>
                                    <p className="text-base bg-white/15 text-white px-2 py-1 rounded-xl inline-block">
                                        <span className="font-semibold">
                                            $180.11
                                        </span>{" "}
                                        one time
                                    </p>
                                    <p className="text-xl text-primary-light mt-6">
                                        From
                                    </p>
                                    <p className="text-6xl font-bold text-primary-light mt-2">
                                        $25.73
                                        <span className="text-xl font-normal">
                                            /Per month
                                        </span>
                                    </p>
                                </div>

                                {/* Right Section */}
                                <div className="flex flex-col items-start gap-y-4">
                                    <div className="flex flex-col gap-y-1">
                                        <p className="flex items-center gap-6 text-white text-xl font-medium">
                                            Index
                                            <span className="bg-primary p-1 rounded-full">
                                                <Check
                                                    className="text-white"
                                                    size={18}
                                                />
                                            </span>
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            DA 60
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            PA 70
                                        </p>
                                    </div>
                                    <div className="flex flex-col gap-y-1">
                                        <p className="text-white text-xl font-medium">
                                            Our Inventory
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            No. of DA60 pages:
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            1911
                                        </p>
                                    </div>
                                </div>
                            </CardContent>
                            <CardFooter className="flex justify-center p-0 mt-6">
                                <Button className="px-6 py-8 bg-primary-light hover:bg-primary text-primary-dark/90 text-xl font-semibold shadow-md rounded-xl w-full">
                                    Get inside
                                </Button>
                            </CardFooter>
                        </Card>
                    </TabsContent>
                    <TabsContent value="da70">
                        <Card className="bg-white/10 backdrop-blur-xl border border-white/50 shadow-sm rounded-xl px-6 sm:px-10 py-6 sm:py-12">
                            <CardContent className="flex flex-col md:flex-row items-start sm:items-center justify-between gap-4 sm:gap-16 p-0">
                                {/* Left Section */}
                                <div>
                                    <p className="text-base bg-white/15 text-white px-2 py-1 rounded-xl inline-block">
                                        <span className="font-semibold">
                                            $181.84
                                        </span>{" "}
                                        one time
                                    </p>
                                    <p className="text-xl text-primary-light mt-6">
                                        From
                                    </p>
                                    <p className="text-6xl font-bold text-primary-light mt-2">
                                        $25.12
                                        <span className="text-xl font-normal">
                                            /Per month
                                        </span>
                                    </p>
                                </div>

                                {/* Right Section */}
                                <div className="flex flex-col items-start gap-y-4">
                                    <div className="flex flex-col gap-y-1">
                                        <p className="flex items-center gap-6 text-white text-xl font-medium">
                                            Index
                                            <span className="bg-primary p-1 rounded-full">
                                                <Check
                                                    className="text-white"
                                                    size={18}
                                                />
                                            </span>
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            DA 70
                                        </p>
                                    </div>
                                    <div className="flex flex-col gap-y-1">
                                        <p className="text-white text-xl font-medium">
                                            Our Inventory
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            No. of DA70 pages:
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            1187
                                        </p>
                                    </div>
                                </div>
                            </CardContent>
                            <CardFooter className="flex justify-center p-0 mt-6">
                                <Button className="px-6 py-8 bg-primary-light hover:bg-primary text-primary-dark/90 text-xl font-semibold shadow-md rounded-xl w-full">
                                    Get inside
                                </Button>
                            </CardFooter>
                        </Card>
                    </TabsContent>
                    <TabsContent value="da80">
                        <Card className="bg-white/10 backdrop-blur-xl border border-white/50 shadow-sm rounded-xl px-6 sm:px-10 py-6 sm:py-12">
                            <CardContent className="flex flex-col md:flex-row items-start sm:items-center justify-between gap-4 sm:gap-16 p-0">
                                {/* Left Section */}
                                <div>
                                    <p className="text-base bg-white/15 text-white px-2 py-1 rounded-xl inline-block">
                                        <span className="font-semibold">
                                            $215.29
                                        </span>{" "}
                                        one time
                                    </p>
                                    <p className="text-xl text-primary-light mt-6">
                                        From
                                    </p>
                                    <p className="text-6xl font-bold text-primary-light mt-2">
                                        $30.47
                                        <span className="text-xl font-normal">
                                            /Per month
                                        </span>
                                    </p>
                                </div>

                                {/* Right Section */}
                                <div className="flex flex-col items-start gap-y-4">
                                    <div className="flex flex-col gap-y-1">
                                        <p className="flex items-center gap-6 text-white text-xl font-medium">
                                            Index
                                            <span className="bg-primary p-1 rounded-full">
                                                <Check
                                                    className="text-white"
                                                    size={18}
                                                />
                                            </span>
                                        </p>
                                        <p className="text-white text-xl font-medium">
                                            DA 80
                                        </p>
                                    </div>
                                    <div className="flex flex-col gap-y-1">
                                        <p className="text-white text-xl font-medium">
                                            Our Inventory
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            No. of DA80 pages:
                                        </p>
                                        <p className="text-white/75 text-lg font-medium">
                                            13
                                        </p>
                                    </div>
                                </div>
                            </CardContent>
                            <CardFooter className="flex justify-center p-0 mt-6">
                                <Button className="px-6 py-8 bg-primary-light hover:bg-primary text-primary-dark/90 text-xl font-semibold shadow-md rounded-xl w-full">
                                    Get inside
                                </Button>
                            </CardFooter>
                        </Card>
                    </TabsContent>
                </div>
            </div>
        </Tabs>
    );
};

export default PricingTab;
