import { InertiaLink } from "@inertiajs/inertia-react";

function Formations() {
    const id = 5;

    return (
        <div>
            <div>
                <div
                    className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                    style={{
                        backgroundImage:
                            "url(/MicrosoftTeams-image12.png)",
                    }}
                >
                    <h1 className="md:text-3xl">FORMATIONS</h1>
                </div>
                <div className="bg-[#f6f6f6] md:px-14 lg:px-20 lg:grid lg:grid-cols-2">
                    <div className=" flex flex-col items-center pt-6 pb-6">
                        <div className="bg-white mx-10 h-40 rounded-xl flex w-3/4 md:h-48 lg:w-[90%]">
                            <div className="w-[50%] md:w-[35%] lg:w-[45%] xl:w-[30%]">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                                />
                            </div>
                            <div className="w-[50%] flex flex-col items-center justify-center md:w-[65%] md:items-start md:pl-4 lg:w-[55%] xl:w-[70%]">
                                <h3 className="font-bold">TEST</h3>
                                <p className="text-[#D70B52] text-sm md:mb-4">
                                    17/11/2023
                                </p>
                                <p className="md:mb-4">test</p>
                                <InertiaLink
                                    href={`/formations/${id}`}
                                    className="bg-[#D70B52] text-white py-1 px-2 text-center rounded-xl text-sm mb-6"
                                >
                                    Lire la suite
                                </InertiaLink>
                            </div>
                        </div>
                    </div>
                    <div className=" flex flex-col items-center pt-6 pb-6">
                        <div className="bg-white mx-10 h-40 rounded-xl flex w-3/4 md:h-48 lg:w-[90%]">
                            <div className="w-[50%] md:w-[35%] lg:w-[45%] xl:w-[30%]">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                                />
                            </div>
                            <div className="w-[50%] flex flex-col items-center justify-center md:w-[65%] md:items-start md:pl-4 lg:w-[55%] xl:w-[70%]">
                                <h3 className="font-bold">TEST</h3>
                                <p className="text-[#D70B52] text-sm md:mb-4">
                                    17/11/2023
                                </p>
                                <p className="md:mb-4">test</p>
                                <InertiaLink
                                    href={`/formations/${id}`}
                                    className="bg-[#D70B52] text-white py-1 px-2 text-center rounded-xl text-sm mb-6"
                                >
                                    Lire la suite
                                </InertiaLink>
                            </div>
                        </div>
                    </div>
                    <div className=" flex flex-col items-center pt-6 pb-6">
                        <div className="bg-white mx-10 h-40 rounded-xl flex w-3/4 md:h-48 lg:w-[90%]">
                            <div className="w-[50%] md:w-[35%] lg:w-[45%] xl:w-[30%]">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                                />
                            </div>
                            <div className="w-[50%] flex flex-col items-center justify-center md:w-[65%] md:items-start md:pl-4 lg:w-[55%] xl:w-[70%]">
                                <h3 className="font-bold">TEST</h3>
                                <p className="text-[#D70B52] text-sm md:mb-4">
                                    17/11/2023
                                </p>
                                <p className="md:mb-4">test</p>
                                <InertiaLink
                                    href={`/formations/${id}`}
                                    className="bg-[#D70B52] text-white py-1 px-2 text-center rounded-xl text-sm mb-6"
                                >
                                    Lire la suite
                                </InertiaLink>
                            </div>
                        </div>
                    </div>
                    <div className=" flex flex-col items-center pt-6 pb-6">
                        <div className="bg-white mx-10 h-40 rounded-xl flex w-3/4 md:h-48 lg:w-[90%]">
                            <div className="w-[50%] md:w-[35%] lg:w-[45%] xl:w-[30%]">
                                <img
                                    src=""
                                    alt=""
                                    className="border-2 my-1 mx-2 rounded-3xl h-[90%]"
                                />
                            </div>
                            <div className="w-[50%] flex flex-col items-center justify-center md:w-[65%] md:items-start md:pl-4 lg:w-[55%] xl:w-[70%]">
                                <h3 className="font-bold">TEST</h3>
                                <p className="text-[#D70B52] text-sm md:mb-4">
                                    17/11/2023
                                </p>
                                <p className="md:mb-4">test</p>
                                <InertiaLink
                                    href={`/formations/${id}`}
                                    className="bg-[#D70B52] text-white py-1 px-2 text-center rounded-xl text-sm mb-6"
                                >
                                    Lire la suite
                                </InertiaLink>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Formations;
