import React, { useState } from "react";
import ReactDOM from "react-dom/client";
import { Button } from "./ui/button"; // Adjust the path as needed

const Counter = () => {
    const [count, setCount] = useState(0);

    return (
        <div className="p-4">
            <h1 className="text-lg font-bold">Counter: {count}</h1>
            <button
                className="bg-blue-500 text-white px-4 py-2 rounded"
                onClick={() => setCount(count + 1)}
            >
                Increment
            </button>
            <div className="p-4">
                <h1 className="text-lg font-bold">Counter: {count}</h1>
                <Button onClick={() => setCount(count + 1)}>Increment</Button>
            </div>
        </div>
    );
};

const rootElement = document.getElementById("app");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<Counter />);
}

export default Counter;
