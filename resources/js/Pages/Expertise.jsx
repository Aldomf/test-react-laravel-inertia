import { InertiaLink } from "@inertiajs/inertia-react";

function Expertise() {
    return (
        <div>
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{ backgroundImage: "url(/MicrosoftTeams-image14.png)" }}
            >
                <h1 className="md:text-3xl">NOTRE EXPERTISE</h1>
            </div>
            <div className="flex flex-col pl-4 p-4 font-semibold md:px-14 lg:px-20">
                <p className="mb-6">
                    L’entreprise est au cœur de notre projet. La Mission Locale
                    s’engage à vos côtés, vous accompagne et vous conseille au
                    quotidien grâce à l’expertise de nos chargés de relations
                    entreprises !
                </p>
                <p className="mb-6">
                    En tant que membre service public de l’emploi, la Mission
                    Locale vous offre un service sur mesure pour répondre à
                    l’ensemble de vos besoins tels que le recrutement de jeunes
                    talents mais aussi la mise en œuvre de votre politique RSE.
                </p>
                <p className="mb-6">
                    Vous avez besoin d’échanger sur le profil de poste adapté à
                    votre organisation, d’avoir des informations sur les mesures
                    d’aide à l’embauche (contrats aidés, alternance…),
                    d’organiser une session de recrutement ? Prenez contact avec
                    nos experts métiers qui prendront en charge l’intégralité de
                    vos besoins.
                </p>
                <InertiaLink
                    href="/your-route" // Replace with the actual route URL
                    className="bg-[#F29200] text-white font-semibold py-1 px-3 text-center rounded-lg text-sm mb-6 md:w-64"
                >
                    PRENDRE RDV
                </InertiaLink>
            </div>
        </div>
    );
}

export default Expertise;
