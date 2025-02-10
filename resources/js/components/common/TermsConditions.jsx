import ReactDOM from "react-dom/client";
import BreadcrumbBanner from "./BreadcrumbBanner";
const TermsConditions = () => {
    return (
        <>
            <BreadcrumbBanner />
        </>
    );
};

const rootElement = document.getElementById("terms-conditions");
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<TermsConditions />);
}

export default TermsConditions;
