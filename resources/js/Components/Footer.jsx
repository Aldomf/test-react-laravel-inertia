import { FaLinkedinIn, FaFacebookF, FaInstagram } from "react-icons/fa";
import { Link } from "react-router-dom";

function Footer() {
  return (
    <>
      <div className="bg-[#252323] px-8 pb-8 pt-8 md:flex">
        <div className="md:w-[30%]">
          <Link to="" onClick={() => window.scrollTo(0, 0)}>
            <img
              src="/public/logo1.png"
              alt=""
              className="bg-white rounded-lg mb-6"
            />
          </Link>
          <p className="text-white text-xs">
            LA MISSION LOCALE DES MUREAUX ACCOMPAGNE LES JEUNES DE 16 À 25 ANS
            DANS LA RECHERCHE D&apos;EMPLOI, DE FORMATION OU D&apos;ALTERNANCE{" "}
          </p>
        </div>
        <div className="md:w-[20%] md:flex md:flex-col md:items-center">
          <h2 className="text-white mt-6 font-bold md:mb-4">ACCÈS RAPIDE</h2>
          <p className="text-white text-xs">
            <Link
              to=""
              className="cursor-pointer"
              onClick={() => window.scrollTo(0, 0)}
            >
              LA MISSION LOCALE
            </Link>
            <br />
            <Link to="/se-former" onClick={() => window.scrollTo(0, 0)}>SERVICES</Link> <br />
            <Link to="/actualites" onClick={() => window.scrollTo(0, 0)}>ACTUALITÉS</Link> <br />
            <Link to="/ateliers" onClick={() => window.scrollTo(0, 0)}>ATELIERS</Link> <br />
            <Link to="/connexion-entreprise" onClick={() => window.scrollTo(0, 0)}>ENTREPRISES</Link> <br />
            <Link to="/connexion-jeune" onClick={() => window.scrollTo(0, 0)}>JEUNES</Link>
          </p>
        </div>
        <div className="md:w-[20%] md:pr-4">
          <h2 className="text-white mt-6 font-bold md:mb-4">
            HORAIRES D&apos;OUVERTURE:
          </h2>
          <p className="text-white text-xs">
            DU LUNDI AU VENDREDI <br />
            DE 08H45 À 12H15 ET <br />
            DE 13H30 À 17H30
          </p>
        </div>
        <div className="text-white text-xs mt-6 font-bold md:w-[30%]">
          <div>
            <h2 className="flex items-center md:mb-2">
              NOUS SUIVRE:
              <Link>
                <FaLinkedinIn className=" text-white ml-2" />
              </Link>
              <Link>
                <FaFacebookF className=" text-white ml-2" />
              </Link>
              <Link>
                <FaInstagram className=" text-white ml-2" />
              </Link>
            </h2>
          </div>
          <h2 className="md:mb-2">NOUS CONTACTER</h2>
          <h2 className="md:mb-2">NOUS LOCALISER</h2>
          <div className="mt-4">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2618.0406529566458!2d1.9105878751635066!3d48.9907837913822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6928ec8766197%3A0x4a462aa9e0eb44c3!2s38%20Av.%20Paul%20Raoult%2C%2078130%20Les%20Mureaux!5e0!3m2!1sfr!2sfr!4v1699452035578!5m2!1sfr!2sfr"
              style={{ width: "100%", height: "150px" }}
              className="rounded-lg"
            ></iframe>
          </div>
        </div>
      </div>
      <div className="w-100% bg-black py-3 border-t-2 border-gray-500">
        <p className="text-white text-[8px] text-center md:text-xs">
          © 2023 MISSION LOCALE DES MUREAUX - TOUS DROITS RESERVES - INFORMATION
          LEGALES - POLITIQUE DE CONFIDENTIALITE
        </p>
      </div>
    </>
  );
}

export default Footer;
