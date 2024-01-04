import { InertiaLink } from "@inertiajs/inertia-react";
import { FaLocationDot } from "react-icons/fa6";

function Formation() {
    return (
        <div>
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{ backgroundImage: "url(/MicrosoftTeams-image12.png)" }}
            >
                <h1 className="md:text-3xl">FORMATION</h1>
            </div>
            <div className=" flex flex-col items-center pt-6 bg-[#F6F6F6] md:px-14 lg:px-20">
                <div className="border-2 border-[#D70B52] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">
                        ATELIER PODCAST
                    </h2>
                    <p className="mb-4">
                        Initié par notre partenaire Insersite, cet atelier Photo
                        Professionnelle vous permettra de découvrir le métier de
                        photographe, de vous initier aux techniques photo, et de
                        prendre en main ses différents outils
                    </p>
                    <InertiaLink
                        href="/"
                        className="bg-[#D70B52] text-white py-1 px-2 text-center rounded-xl text-sm mb-6 w-[55%] md:w-56"
                    >
                        S'inscrire à la formation
                    </InertiaLink>
                </div>
                <div className="flex mb-6 justify-center items-center md:justify-start md:items-center md:w-[90%] md:ml-4">
                    <div className=" w-[40%] md:w-fit md:mr-4">
                        <p className="font-semibold text-sm md:text-base">
                            LA PROCHAINE FORMATION
                        </p>
                    </div>
                    <div className="flex flex-col items-center w-[50%] md:w-fit bg-white rounded-lg px-4 py-2">
                        <p className="font-bold text-sm text-center">
                            DU 08/12/2023 AU 14/12/2023
                        </p>
                        <p className="text-sm font-semibold flex justify-center items-center">
                            <FaLocationDot className="mr-1 text-[#D70B52]" />{" "}
                            Lieu de la formation
                        </p>
                    </div>
                </div>
                <div className="border-2 border-[#D70B52] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">METIER</h2>
                    <p className="mb-4">
                        Véritable technicien de l’image, le Photographe
                        Professionnel sait comment composer une photo, comment
                        l’éclairer, et faire en sorte que le produit fini
                        raconte une histoire. Il possède des compétences
                        techniques et un esprit créatif, un fort bagage
                        culturel, et une véritable sensibilité artistique.
                    </p>
                </div>
                <div className="border-2 border-[#D70B52] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">METIER</h2>
                    <p className="mb-4">
                        Vous initier au métier de photographe, en vous faisant
                        découvrir les bases qu’elles soient au niveau technique
                        (prise en main de l’appareil...) ou bien au niveau
                        artistique (composition, éclairage…). Vous permettre de
                        découvrir ce métier fascinant qui laisse libre cours à
                        votre imagination et à votre créativité.
                    </p>
                </div>
                <div className="border-2 border-[#D70B52] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">
                        DUREE ET PREREQUIS
                    </h2>
                    <p className="mb-4 font-semibold">Durée :</p>
                    <p className="mb-4 font-semibold">Prérequis :</p>
                </div>
                <div className="border-2 border-[#D70B52] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
                    <h2 className="font-semibold text-lg mb-2">
                        PROGRAM DE LA FORMATION
                    </h2>
                    <p className="mb-4"></p>
                </div>
            </div>
        </div>
    );
}

export default Formation;
