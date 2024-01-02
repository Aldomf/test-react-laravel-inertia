import React, { useState, useEffect } from "react";
import AboveMenu from "./AboveMenu";
import Menu from "./Menu";

function Header() {
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      const scrolled = window.scrollY > 50;
      setIsScrolled(scrolled);
    };

    window.addEventListener("scroll", handleScroll);

    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  }, []);

  return (
    <div
      className={`${
        isScrolled
          ? "fixed top-0 left-0 w-full bg-white shadow-md"
          : "relative"
      } transition-all duration-300 ease-in-out z-50`}
    >
      <AboveMenu />
      <Menu />
    </div>
  );
}

export default Header;

