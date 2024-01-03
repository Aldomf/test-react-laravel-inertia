import { useState, useEffect } from "react";
import { InertiaLink } from "@inertiajs/inertia-react"; // Import InertiaLink instead of Link
import { FaUser } from "react-icons/fa";

function DropdownButtonConnexion() {

    const [isDropdownOpen, setDropdownOpen] = useState(false);

    const handleDropdownToggle = () => {
        setDropdownOpen(!isDropdownOpen);
    };

    const handleMouseEnter = () => {
        setDropdownOpen(true);
    };

    const handleMouseLeave = () => {
        setDropdownOpen(false);
    };

    useEffect(() => {
        const handleScroll = () => {
            setDropdownOpen(false);
        };

        // Attach the event listener when the component mounts
        window.addEventListener("scroll", handleScroll);

        // Detach the event listener when the component unmounts
        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    }, []); // Empty dependency array means the effect runs once when the component mounts

    return (
        <div
            className="relative inline-block text-center"
            onMouseEnter={handleMouseEnter}
            onMouseLeave={handleMouseLeave}
        >
            <button
                id="dropdownHoverButton"
                className="font-semibold text-center inline-flex items-center"
                onClick={handleDropdownToggle}
                type="button"
            >
                <FaUser className="mr-2"/>
                CONNEXION
            </button>

            {/* Dropdown menu */}
            {isDropdownOpen && (
                <div
                    id="dropdownHover"
                    className="z-10 absolute mt-[1px] origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow w-fit dark:bg-gray-700"
                    onMouseEnter={handleMouseEnter}
                    onMouseLeave={handleMouseLeave}
                >
                    <ul className="text-sm text-white bg-[#252323] flex flex-col items-start">
                        <li>
                            <InertiaLink // Use InertiaLink instead of Link
                                href="/connexion-jeune" // Set the href attribute for the InertiaLink
                                className="block text-left px-4 py-2 hover:bg-[#A4195C] dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Espace Jeune
                            </InertiaLink>
                        </li>
                        <li>
                            <InertiaLink // Use InertiaLink instead of Link
                                href="/connexion-entreprise" // Set the href attribute for the InertiaLink
                                className="block text-left px-4 py-2 hover:bg-[#F39101] dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Espace Entreprise
                            </InertiaLink>
                        </li>
                    </ul>
                </div>
            )}
        </div>
    );
}

export default DropdownButtonConnexion;
