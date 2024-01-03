import { InertiaLink } from "@inertiajs/inertia-react";

function UnAtelier() {
    return (
        <div>
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{ backgroundImage: "url(/MicrosoftTeams-image13.png)" }}
            >
                <h1 className="md:text-3xl">ATELIER</h1>
            </div>
            <div className=" flex flex-col items-center pt-6 bg-[#F6F6F6] md:px-14 lg:px-20">
                <div className="border-2 border-[#95c11f] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
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
                        className="bg-[#95c11f] text-white py-1 px-2 text-center rounded-xl text-sm mb-6 w-[55%] md:w-56"
                    >
                        S'inscrire à l'atelier
                    </InertiaLink>
                </div>
                <div className="flex mb-6 md:justify-start md:items-center md:w-[90%] md:ml-4">
                    <div className=" w-[40%] md:w-fit md:mr-4">
                        <p className="font-semibold">LE PROCHAIN ATELIER</p>
                    </div>
                    <div className="flex justify-between w-[60%] md:w-fit font-bold">
                        <p className="bg-white px-2 py-3 rounded-lg md:mr-4 md:px-3">
                            12
                        </p>
                        <p className="bg-white px-2 py-3 rounded-lg md:mr-4 md:px-3">
                            12
                        </p>
                        <p className="bg-white px-2 py-3 rounded-lg md:mr-4 md:px-3">
                            2023
                        </p>
                    </div>
                </div>
                <div className="border-2 border-[#95c11f] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
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
                <div className="border-2 border-[#95c11f] flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
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
            </div>
        </div>
    );
}

export default UnAtelier;
