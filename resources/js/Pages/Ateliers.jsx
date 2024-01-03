import { InertiaLink } from "@inertiajs/inertia-react";

function Ateliers() {
    const id = 5;

    return (
        <div>
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{ backgroundImage: "url(/MicrosoftTeams-image13.png)" }}
            >
                <h1 className="md:text-3xl">ATELIERS</h1>
            </div>
            <div className="bg-[#f6f6f6] flex flex-col items-center pt-6 md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-8 w-[85%] md:text-2xl">
                    <span className="border-b-2 border-[#95c11f] pb-[0.5px]">
                        LES AT
                    </span>
                    ELIERS PROPOSES PAR LA MISSION LOCALE DES MUREAUX
                </h2>
                <div className="bg-white mx-10 h-40 mb-4 rounded-xl flex w-3/4 md:h-48">
                    <div className="w-[50%] md:w-[35%] lg:w-[25%] xl:w-[15%]">
                        <img
                            src=""
                            alt=""
                            className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                        />
                    </div>
                    <div className="w-[50%] flex flex-col items-center justify-center md:w-[65%] md:items-start md:pl-4 lg:w-[75%] xl:w-[85%]">
                        <h3 className="font-bold md:mb-4">TEST</h3>
                        <p className="md:mb-4">test</p>
                        <InertiaLink
                            href={`/ateliers/${id}`}
                            className="bg-[#95c11f] text-white py-1 px-2 text-center rounded-xl text-sm mb-6 md:px-6"
                        >
                            Lire la suite
                        </InertiaLink>
                    </div>
                </div>
                <div className="bg-white mx-10 h-40 mb-4 rounded-xl flex w-3/4 md:h-48">
                    <div className="w-[50%] md:w-[35%] lg:w-[25%] xl:w-[15%]">
                        <img
                            src=""
                            alt=""
                            className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                        />
                    </div>
                    <div className="w-[50%] flex flex-col items-center justify-center md:w-[65%] md:items-start md:pl-4 lg:w-[75%] xl:w-[85%]">
                        <h3 className="font-bold md:mb-4">TEST</h3>
                        <p className="md:mb-4">test</p>
                        <InertiaLink
                            href={`/ateliers/${id}`}
                            className="bg-[#95c11f] text-white py-1 px-2 text-center rounded-xl text-sm mb-6 md:px-6"
                        >
                            Lire la suite
                        </InertiaLink>
                    </div>
                </div>
                <div className="bg-white mx-10 h-40 mb-4 rounded-xl flex w-3/4 md:h-48">
                    <div className="w-[50%] md:w-[35%] lg:w-[25%] xl:w-[15%]">
                        <img
                            src=""
                            alt=""
                            className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                        />
                    </div>
                    <div className="w-[50%] flex flex-col items-center justify-center md:w-[65%] md:items-start md:pl-4 lg:w-[75%] xl:w-[85%]">
                        <h3 className="font-bold md:mb-4">TEST</h3>
                        <p className="md:mb-4">test</p>
                        <InertiaLink
                            href={`/ateliers/${id}`}
                            className="bg-[#95c11f] text-white py-1 px-2 text-center rounded-xl text-sm mb-6 md:px-6"
                        >
                            Lire la suite
                        </InertiaLink>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Ateliers;
