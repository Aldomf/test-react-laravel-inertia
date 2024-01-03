import { InertiaLink } from "@inertiajs/inertia-react";

function Gouvernance() {
    return (
        <div className="bg-[#f6f6f6]">
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{
                    backgroundImage: "url(/MicrosoftTeams-image11.png)",
                }}
            >
                <h1 className="md:text-3xl">GOUVERNANCE</h1>
            </div>
            <div>
                <div className=" flex flex-col items-center pt-6 md:items-start md:mx-14 lg:mx-20">
                    <h2 className="font-bold text-black text-lg mb-8 w-[85%] md:text-2xl">
                        <span className="border-b-2 border-[#A4195C] pb-[0.5px]">
                            CONSEIL
                        </span>{" "}
                        D'ADMINISTRATION
                    </h2>
                    <div className="bg-white mx-10 h-28 rounded-xl flex w-3/4 md:mx-0 md:w-[90%]">
                        <div className="w-[40%] md:w-[20%] lg:w-[15%] xl:w-[10%]">
                            <img
                                src=""
                                alt=""
                                className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                            />
                        </div>
                        <div className="w-[60%] flex flex-col items-center justify-center md:items-start md:ml-4">
                            <h3 className="font-bold">PRESIDENTE</h3>
                            <p>Prenom Nom</p>
                            <p>Mot de la pre</p>
                        </div>
                    </div>
                </div>
                <div className=" flex flex-col items-center md:items-start md:mx-14 lg:mx-20">
                    <h2 className="font-bold text-black text-lg mb-8 mt-6 w-[85%] md:text-2xl">
                        <span className="border-b-2 border-[#A4195C] pb-[0.5px]">
                            BUREAU
                        </span>
                    </h2>
                    <div className="md:w-full md:grid md:grid-cols-2 lg:grid-cols-3">
                        <div className="bg-white mb-4 mx-10 h-28 rounded-xl flex w-3/4 md:flex-col md:w-52 md:items-center md:h-fit md:py-4 md:mx-0 md:mb-8">
                            <div className="w-[40%] md:w-28 md:h-28 md:rounded-full">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%] md:w-28 md:h-28 md:rounded-full md:mx-0 md:my-0"
                                />
                            </div>
                            <div className="w-[80%] flex flex-col justify-center md:mt-6">
                                <h3 className="font-bold leading-tight border-b-2 border-[#A4195C] mb-2 mr-10 md:pb-4">
                                    PRENOM <br />
                                    NOM
                                </h3>
                                <p className="md:mt-4">Vice-President</p>
                            </div>
                        </div>
                        <div className="bg-white mb-4 mx-10 h-28 rounded-xl flex w-3/4 md:flex-col md:w-52 md:items-center md:h-fit md:py-4 md:mx-0 md:mb-8">
                            <div className="w-[40%] md:w-28 md:h-28 md:rounded-full">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%] md:w-28 md:h-28 md:rounded-full md:mx-0 md:my-0"
                                />
                            </div>
                            <div className="w-[80%] flex flex-col justify-center md:mt-6">
                                <h3 className="font-bold leading-tight border-b-2 border-[#D70B52] mb-2 mr-10 md:pb-4">
                                    PRENOM <br />
                                    NOM
                                </h3>
                                <p className="md:mt-4">Vice-President</p>
                            </div>
                        </div>
                        <div className="bg-white mb-4 mx-10 h-28 rounded-xl flex w-3/4 md:flex-col md:w-52 md:items-center md:h-fit md:py-4 md:mx-0 md:mb-8">
                            <div className="w-[40%] md:w-28 md:h-28 md:rounded-full">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%] md:w-28 md:h-28 md:rounded-full md:mx-0 md:my-0"
                                />
                            </div>
                            <div className="w-[80%] flex flex-col justify-center md:mt-6">
                                <h3 className="font-bold leading-tight border-b-2 border-[#2997D6] mb-2 mr-10 md:pb-4">
                                    PRENOM <br />
                                    NOM
                                </h3>
                                <p className="md:mt-4">TRESORIER</p>
                            </div>
                        </div>
                        <div className="bg-white mb-4 mx-10 h-28 rounded-xl flex w-3/4 md:flex-col md:w-52 md:items-center md:h-fit md:py-4 md:mx-0 md:mb-8">
                            <div className="w-[40%] md:w-28 md:h-28 md:rounded-full">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%] md:w-28 md:h-28 md:rounded-full md:mx-0 md:my-0"
                                />
                            </div>
                            <div className="w-[80%] flex flex-col justify-center md:mt-6">
                                <h3 className="font-bold leading-tight border-b-2 border-[#95C221] mb-2 mr-10 md:pb-4">
                                    PRENOM <br />
                                    NOM
                                </h3>
                                <p className="md:mt-4">SECRETAIRE</p>
                            </div>
                        </div>
                        <div className="bg-white mb-4 mx-10 h-28 rounded-xl flex w-3/4 md:flex-col md:w-52 md:items-center md:h-fit md:py-4 md:mx-0 md:mb-8">
                            <div className="w-[40%] md:w-28 md:h-28 md:rounded-full">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%] md:w-28 md:h-28 md:rounded-full md:mx-0 md:my-0"
                                />
                            </div>
                            <div className="w-[80%] flex flex-col justify-center md:mt-6">
                                <h3 className="font-bold leading-tight border-b-2 border-[#F29200] mb-2 mr-10 md:pb-4">
                                    PRENOM <br />
                                    NOM
                                </h3>
                                <p className="md:mt-4">SECRETAIRE ADJOINT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="flex flex-col items-center pt-6 md:items-start md:mx-14 lg:mx-20">
                <div className="flex flex-col items-center md:items-start">
                    <h2 className="font-bold text-black text-lg mb-8 mt-6 w-[85%] md:text-2xl md:mb-4">
                        <span className="border-b-2 border-[#A4195C] pb-[0.5px]">
                            RAPPORT
                        </span>{" "}
                        D'ACTIVITE
                    </h2>
                    <p className="text-sm font-semibold flex flex-col items-center pl-4 md:pl-0">
                        VOUS POUVEZ CONSULTER NOS RAPPORTS D'DACTIVITE DE SES 5
                        DERNIERES ANNEES
                    </p>
                </div>
                <div className="flex flex-col md:flex-row  md:w-full md:mt-4">
                    <InertiaLink
                        href="/2022"
                        className="py-2 bg-[#A4195C] mb-4 px-6 rounded-xl text-white mt-6 md:mt-0 md:px-8 md:py-2 md:mr-4"
                    >
                        2022
                    </InertiaLink>

                    <InertiaLink
                        href="/2021"
                        className="py-2 bg-[#D70B52] mb-4 px-6 rounded-xl text-white md:px-8 md:py-2 md:mr-4"
                    >
                        2021
                    </InertiaLink>

                    <InertiaLink
                        href="/2020"
                        className="py-2 bg-[#2997D6] mb-6 px-6 rounded-xl text-white md:px-8 md:py-2 md:mb-4 md:mr-4"
                    >
                        2020
                    </InertiaLink>

                    <InertiaLink
                        href="/2019"
                        className="py-2 bg-[#95C221] mb-6 px-6 rounded-xl text-white md:px-8 md:py-2 md:mb-4 md:mr-4"
                    >
                        2019
                    </InertiaLink>

                    <InertiaLink
                        href="/2018"
                        className="py-2 bg-[#F29200] mb-6 px-6 rounded-xl text-white md:px-8 md:py-2 md:mb-4"
                    >
                        2018
                    </InertiaLink>
                </div>
            </div>
        </div>
    );
}

export default Gouvernance;
