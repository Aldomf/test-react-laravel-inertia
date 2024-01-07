import React, { useState } from "react";
import { InertiaLink } from "@inertiajs/inertia-react"; // Import InertiaLink instead of Link

const DropdownButtonMission = () => {
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

    return (
        <div
            className="relative inline-block text-center"
            onMouseEnter={handleMouseEnter}
            onMouseLeave={handleMouseLeave}
        >
            <button
                id="dropdownHoverButton"
                className="font-semibold text-center inline-flex items-center hover:text-[#A4195C]"
                onClick={handleDropdownToggle}
                type="button"
            >
                LA MISSION LOCALE
                <svg
                    className="w-2.5 h-2.5 ms-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="m1 1 4 4 4-4"
                    />
                </svg>
            </button>

            {/* Dropdown menu */}
            {isDropdownOpen && (
                <div
                    id="dropdownHover"
                    className="z-10 absolute mt-[0.5px] origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow w-fit dark:bg-gray-700"
                    onMouseEnter={handleMouseEnter}
                    onMouseLeave={handleMouseLeave}
                >
                    <ul className="text-sm text-gray-700 dark:text-gray-200 flex flex-col">
                        <li>
                            <a
                                href="/nos-missions"
                                className="block text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:rounded-t-lg dark:hover:text-white hover:text-[#A4195C]"
                            >
                                Nos missions
                            </a>
                        </li>
                        <li>
                            <InertiaLink // Use InertiaLink instead of Link
                                href="/nos-communes" // Set the href attribute for the InertiaLink
                                className="block text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:text-[#A4195C]"
                            >
                                Nos communes
                            </InertiaLink>
                        </li>
                        <li>
                            <InertiaLink // Use InertiaLink instead of Link
                                href="/gouvernance" // Set the href attribute for the InertiaLink
                                className="block text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white hover:text-[#A4195C]"
                            >
                                La gouvernance
                            </InertiaLink>
                        </li>
                        <li>
                            <InertiaLink // Use InertiaLink instead of Link
                                href="/equipe" // Set the href attribute for the InertiaLink
                                className="block text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:rounded-b-lg dark:hover:text-white hover:text-[#A4195C]"
                            >
                                Notre équipe
                            </InertiaLink>
                        </li>
                    </ul>
                </div>
            )}
        </div>
    );
};

export default DropdownButtonMission;
