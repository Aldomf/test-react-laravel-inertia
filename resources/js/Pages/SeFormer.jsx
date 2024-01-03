import { InertiaLink } from "@inertiajs/inertia-react";

function SeFormer() {
    return (
        <div>
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{
                    backgroundImage: "url(/MicrosoftTeams-image12.png)",
                }}
            >
                <h1 className="md:text-3xl">SE FORMER</h1>
            </div>
            <div className="flex flex-col items-center">
                <div>
                    <div className="flex flex-col px-4 pt-4 font-semibold md:px-14 lg:px-20">
                        <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                            <span className="border-b-2 border-[#D70B52] pb-[0.5px]">
                                Aide à
                            </span>{" "}
                            l’accès à la formation
                        </h2>
                        <h3 className="leading-tight">
                            La Mission Locale des Mureaux vous soutient et vous
                            accompagne dans votre projet de qualification
                            professionnelle :{" "}
                        </h3>
                        <ul className="mb-6 mt-6 leading-tight">
                            <li>
                                - conseils sur les formations et les
                                financements possibles{" "}
                            </li>
                            <li>
                                - recherche de l’organisme de formation le plus
                                adapté à votre situation{" "}
                            </li>
                            <li>
                                - mise en relation avec l’organisme de
                                formations{" "}
                            </li>
                            <li>- préparation à l’entrée en formations </li>
                            <li>
                                - soutien tout au long du parcours de formations{" "}
                            </li>
                        </ul>
                        <p className="mb-6 leading-tight">
                            Pour accéder à l’une de nos formations proposées,
                            contactez votre conseiller de la Mission Locale.
                        </p>
                    </div>
                    <div className="flex flex-col px-4 pt-4  font-semibold bg-[#F6F6F6] md:px-14 lg:px-20">
                        <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                            <span className="border-b-2 border-[#D70B52] pb-[0.5px]">
                                Les for
                            </span>
                            mations pré-qualifiantes
                        </h2>
                        <p className="mb-6">
                            Une formation pré-qualifiante est, pourrait-on dire,
                            une introduction, une découverte d’un métier ou d’un
                            secteur professionnel. Durant celle-ci, vous seront
                            présentées les bases constitutives, les pratiques
                            courantes, pour y évoluer. Vous effectuerez aussi
                            des stages qui vous permettront d’avoir une première
                            expérience pratique dans le domaine choisi.{" "}
                        </p>
                    </div>
                </div>
            </div>
            <div className="flex flex-col px-4 pt-4  font-semibold md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                    <span className="border-b-2 border-[#D70B52] pb-[0.5px]">
                        Les for
                    </span>
                    mations qualifiantes
                </h2>
                <p className="mb-6">
                    Les formations qualifiantes sont des formations de durée
                    variable, mais longues pour la plupart, préparant à une
                    qualification reconnue, que ce soit par le biais de la
                    préparation à un diplôme ou encore à un titre professionnel.
                    Elles se composent de cours théoriques et de stages.
                </p>
            </div>
            <div className="flex flex-col px-4 pt-4 font-semibold bg-[#F6F6F6] md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                    <span className="border-b-2 border-[#D70B52] pb-[0.5px]">
                        Appr
                    </span>
                    entissage
                </h2>
                <p className="mb-6">
                    Les formations qualifiantes sont des formations de durée
                    variable, mais longues pour la plupart, préparant à une
                    qualification reconnue, que ce soit par le biais de la
                    préparation à un diplôme ou encore à un titre professionnel.
                    Elles se composent de cours théoriques et de stages.
                </p>
                <InertiaLink
                    href="/formations"
                    onClick={() => window.scrollTo(0, 0)}
                    className="bg-[#D70B52] text-white font-semibold py-1 text-center rounded-lg mb-8 text-sm md:w-56"
                >
                    OFFRES DE FORMATIONS
                </InertiaLink>
            </div>
        </div>
    );
}

export default SeFormer;
