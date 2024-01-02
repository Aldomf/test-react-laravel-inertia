import { InertiaLink } from "@inertiajs/inertia-react";

function Actualites() {
    return (
        <div className="mx-4 mt-4 md:px-6 md:my-10">
            <div className="mb-4 lg:mb-10">
                <h1 className="font-bold mb-2 md:text-2xl">
                    <span className="border-b-2 border-[#87D2F0] pb-[0.5px]">
                        NOS
                    </span>{" "}
                    ACTUALITES
                </h1>
                <p className="leading-tight">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Pariatur dignissimos placeat saepe aut perferendis dolores
                    maiores velit fugit ex quo.
                </p>
            </div>
            <div className="flex flex-col items-center md:mb-2">
                <div className="md:flex md:justify-around md:w-full">
                    <div className="border-[1px] w-40 h-56 rounded-xl mb-4 md:w-52 md:h-64 lg:h-72">
                        <img
                            src="/alternance.jpg"
                            alt=""
                            className="border-[1px] h-[70%] rounded-t-lg lg:h-[75%] w-full"
                        />
                        <p className="text-[#87D2F0] text-xs mt-3 font-semibold ml-2">
                            11/10/13
                        </p>
                        <p className="font-bold text-xs ml-2">ALTERNANCE</p>
                    </div>
                    <div className="border-[1px] w-40 h-56 rounded-xl md:w-52 md:h-64 lg:h-72">
                        <img
                            src="/stage.jpg"
                            alt=""
                            className="border-[1px] h-[70%] rounded-t-lg lg:h-[75%] w-full"
                        />
                        <p className="text-[#87D2F0] text-xs mt-3 font-semibold ml-2">
                            18/10/13
                        </p>
                        <p className="font-bold text-xs ml-2">
                            STAGE D'IMMERSION
                        </p>
                    </div>
                </div>
                <InertiaLink
                    href="/actualites"
                    onClick={() => window.scrollTo(0, 0)}
                    className="border-[#87D2F0] border-2 rounded-lg px-3 py-[0.2rem] text-[0.6rem] mt-4 font-semibold text-[#87D2F0] mb-2 md:px-10 md:text-sm"
                >
                    VOIR TOUTE L'ACTUALITE
                </InertiaLink>
            </div>
        </div>
    );
}

export default Actualites;
