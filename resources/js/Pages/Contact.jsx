import { FaFacebook, FaInstagram } from "react-icons/fa";
import { FaLinkedin } from "react-icons/fa6";
import { useMediaQuery } from "react-responsive";
import { InertiaLink } from "@inertiajs/inertia-react";

function Contact() {
    const isLaptopOrLarger = useMediaQuery({ minWidth: 1024 });

    return (
        <div>
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{
                    backgroundImage: "url(/MicrosoftTeams-image16.png)",
                }}
            >
                <h1 className="md:text-3xl">CONTACT</h1>
            </div>
            <div className=" flex flex-col items-center pt-6 bg-[#F6F6F6] md:px-32 lg:px-56 xl:px-[410px]">
                <div className="flex flex-col items-center mx-4 bg-white rounded-lg mb-4 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">ADRESSE</h2>
                    <p className="text-center mb-2">
                        38 AV.PAUL RAOULT, 78130 LES MUREAUX
                    </p>
                    <p className="mb-2">01 30 91 21 50</p>
                    <p className="mb-2">contact@missionlocale-mureaux.org</p>
                </div>
                <div className="flex flex-col items-center mx-4 bg-white rounded-lg mb-4 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">
                        HEURES D'OUVERTURE
                    </h2>
                    <p className="text-center mb-2">
                        DU LUNDI AU JEUDI: <br /> 8:45-12:15, 13:30-17:30
                    </p>
                    <p className="mb-2 text-center">
                        LE VENDREDI: <br /> 8:45-12:15, 13:30-17:15
                    </p>
                </div>
                <div className="flex flex-col items-center mx-4 bg-white rounded-lg mb-4 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">
                        SUIVEZ-NOUS SUR LES RÉSEAUX
                    </h2>
                    <div className="flex justify-between w-[80%] mt-2 mb-2">
                        <InertiaLink href="/linkedin" className="w-10 h-10">
                            <FaLinkedin />
                        </InertiaLink>

                        <InertiaLink href="/facebook" className="w-10 h-10">
                            <FaFacebook />
                        </InertiaLink>

                        <InertiaLink href="/instagram" className="w-10 h-10">
                            <FaInstagram />
                        </InertiaLink>
                    </div>
                </div>
                {isLaptopOrLarger ? (
                    <div className="flex flex-col items-center mx-4 rounded-lg mb-4 w-[90%]">
                        <img
                            src="/carte_mission_locale_mureaux.svg"
                            alt=""
                        />
                    </div>
                ) : (
                    ""
                )}
            </div>
        </div>
    );
}

export default Contact;
