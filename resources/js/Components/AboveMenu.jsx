import { BsFillTelephoneFill } from "react-icons/bs";
import { FaLocationDot } from "react-icons/fa6";
import { useMediaQuery } from "react-responsive";
import DropdownButtonConnexion from "./DropdownButtonConnexion";
import DropdownButtonConnexionMo from "./DropdownButtonConnexionMo";

function AboveMenu() {
  const isTabletOrLarger = useMediaQuery({ minWidth: 768 });

  return (
    <>
      {isTabletOrLarger ? (
        <div className="bg-[#252323] text-white flex justify-end text-xs py-1 pr-10 lg:pr-0 xl:pr-[153px]">
          <div className="mr-6 lg:mr-10 flex items-center">
            <FaLocationDot className="mr-2"/> 38 AV. PAUL RAOULT, 78130 LES MUREAUX
          </div>
          <div className="mr-6 lg:mr-10 flex items-center">
            <BsFillTelephoneFill className="mr-2" /> 01 30 91 21 50
          </div>
          <div className="mr-6 lg:mr-10 flex items-center">
            <DropdownButtonConnexion/>
          </div>
        </div>
      ) : (
        <div className="bg-[#252323] text-white flex justify-end text-xs py-1">
          <div className="mr-4 flex items-center">
            <BsFillTelephoneFill className="mr-2" /> 01 30 91 21 50
          </div>
          <div className="mr-4 flex items-center">
            <DropdownButtonConnexionMo/>
          </div>
        </div>
      )}
    </>
  );
}

export default AboveMenu;
