import { useState, useEffect } from "react";
import { GiHamburgerMenu } from "react-icons/gi";
import { IoIosArrowDown } from "react-icons/io";
import { IoIosArrowUp } from "react-icons/io";
import { InertiaLink } from "@inertiajs/inertia-react";
import { useMediaQuery } from "react-responsive";
import DropdownButtonMission from "./DropdownButtonMission";
import DropdownButtonService from "./DropdownButtonService";
import DropdownButtonEntreprise from "./DropdownButtonEntreprise";

function Menu() {
  const [isMenuOpen, setMenuOpen] = useState(false);
  const [isSubmenuOpen1, setSubmenuOpen1] = useState(false);
  const [isSubmenuOpen2, setSubmenuOpen2] = useState(false);
  const [isSubmenuOpen3, setSubmenuOpen3] = useState(false);

  const isLaptopOrLarger = useMediaQuery({ minWidth: 1024 });

  const toggleMenu = () => {
    setMenuOpen(!isMenuOpen);
    setSubmenuOpen1(false);
    setSubmenuOpen2(false);
    setSubmenuOpen3(false);
  };

  const toggleSubmenu1 = () => {
    setSubmenuOpen1(!isSubmenuOpen1);
    setSubmenuOpen2(false);
    setSubmenuOpen3(false);
  };

  const toggleSubmenu2 = () => {
    setSubmenuOpen2(!isSubmenuOpen2);
    setSubmenuOpen1(false);
    setSubmenuOpen3(false);
  };

  const toggleSubmenu3 = () => {
    setSubmenuOpen3(!isSubmenuOpen3);
    setSubmenuOpen1(false);
    setSubmenuOpen2(false);
  };

  const closeMenu = () => {
    setMenuOpen(false);
    setSubmenuOpen1(false);
    setSubmenuOpen2(false);
    setSubmenuOpen3(false);
  };

  useEffect(() => {
    const handleScroll = () => {
      setMenuOpen(false);
    };

    // Attach the event listener when the component mounts
    window.addEventListener("scroll", handleScroll);

    // Detach the event listener when the component unmounts
    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  }, []); // Empty dependency array means the effect runs once when the component mounts

  return (
    <div>
      {isLaptopOrLarger ? (
        <div className="flex justify-around xl:mx-28">
          <div>
            <InertiaLink href="/" onClick={() => window.scrollTo(0, 0)}>
              <img
                src="/logo1.png"
                alt="logo-mission-local"
                className="w-60 h-20"
              />
            </InertiaLink>
          </div>
          <div className="flex">
            <ul className="flex items-center text-sm font-semibold">
              <li className="flex items-center mr-4">
                <DropdownButtonMission />
              </li>
              <li className="flex items-center mr-4">
                <DropdownButtonService />
              </li>
              <li className="mr-4">
                <InertiaLink href="/actualites" className="hover:text-[#2696D4]">ACTUALITÉS</InertiaLink>
              </li>
              <li className="mr-4">
                <InertiaLink href="/ateliers" className="hover:text-[#93C01F]">ATELIERS</InertiaLink>
              </li>
              <li className="flex items-center mr-4">
                <DropdownButtonEntreprise />
              </li>
              <li>
                <InertiaLink href="/contact" className="hover:text-[#434446]">CONTACTEZ-NOUS</InertiaLink>
              </li>
            </ul>
          </div>
        </div>
      ) : (
        <div>
          <div className="flex items-center justify-between ml-10 relative">
            <InertiaLink href="/">
              <img
                src="/logo1.png"
                alt="logo-mission-local"
                className="w-40 h-15"
              />
            </InertiaLink>
            <GiHamburgerMenu
              className="w-5 h-5 cursor-pointer mr-3"
              onClick={() => toggleMenu()}
            />
          </div>
          {isMenuOpen && (
            <div className="mt-4 ml-10">
              <ul>
                <li className="flex items-center" onClick={toggleSubmenu1}>
                  LA MISSION LOCAL {isSubmenuOpen1 ? <IoIosArrowUp /> : <IoIosArrowDown />}  
                </li>
                {isSubmenuOpen1 && (
                  <ul className="pl-6">
                    <InertiaLink href="/nos-missions" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Nos missions
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/nos-communes" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Nos communes
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/gouvernance" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        La gouvernance
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/equipe" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Notre équipe
                      </li>
                    </InertiaLink>
                  </ul>
                )}
                <li className="flex items-center" onClick={toggleSubmenu2}>
                  SERVICES {isSubmenuOpen2 ? <IoIosArrowUp /> : <IoIosArrowDown />}
                </li>
                {isSubmenuOpen2 && (
                  <ul className="pl-6">
                    <InertiaLink href="/se-former" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Se former
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/sorienter" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        S&apos;orienter
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/trouver-un-emploi" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Trouver un emploi
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/etre-accompagne" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Etre accompagne
                      </li>
                    </InertiaLink>
                  </ul>
                )}
                <li>
                  <InertiaLink href="/actualites" onClick={() => closeMenu()}>
                    ACTUALITÉS
                  </InertiaLink>
                </li>
                <li>
                  <InertiaLink href="/ateliers" onClick={() => closeMenu()}>
                    ATELIERS
                  </InertiaLink>
                </li>
                <li className="flex items-center" onClick={toggleSubmenu3}>
                  ENTREPRISES {isSubmenuOpen3 ? <IoIosArrowUp /> : <IoIosArrowDown />}
                </li>
                {isSubmenuOpen3 && (
                  <ul className="pl-6">
                    <InertiaLink href="/expertise" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Notre expertise
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/demarche-rse" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        S&apos;engager dans une démarche RSE
                      </li>
                    </InertiaLink>
                    <InertiaLink href="/taxe-apprentissage" onClick={() => closeMenu()}>
                      <li className="border-b-2 py-2 text-[#646765]">
                        Taxe d&apos;apprentissage
                      </li>
                    </InertiaLink>
                  </ul>
                )}
                <li>
                  <InertiaLink href="/contact" onClick={() => closeMenu()}>
                    CONTACTEZ-NOUS
                  </InertiaLink>
                </li>
              </ul>
            </div>
          )}
        </div>
      )}
    </div>
  );
}

export default Menu;
