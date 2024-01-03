import { InertiaLink } from "@inertiajs/inertia-react";

function Sorienter() {
    return (
        <div className="bg-[#F6F6F6]">
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{
                    backgroundImage: "url(/MicrosoftTeams-image12.png)",
                }}
            >
                <h1 className="md:text-3xl">S'ORIENTER</h1>
            </div>
            <div className="flex flex-col px-4 pt-4 font-semibold md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                    <span className="border-b-2 border-[#D60B52] pb-[0.5px]">
                        Quel mét
                    </span>
                    ier est fait pour moi ?
                </h2>
                <p className="mb-6">
                    Au sein de la Mission Locale, nous vous informons sur toutes
                    les possibilités de métiers et de formations
                    professionnelles. Nous vous faisons tester de nombreux
                    métiers, en fonction de vos appétences et de vos envies, et
                    vous accompagnons dans l’élaboration de votre projet
                    professionnel.
                </p>
                <p className="mb-6">
                    En fonction de vos centres d’intérêt, un grand nombre de
                    possibilités s’ouvrent à vous. La Mission Locale vous donne
                    la possibilité de découvrir les métiers et voies
                    professionnelles possibles, en fonction de vos compétences
                    et aspirations.
                </p>
            </div>
            <div className="flex flex-col px-4 pt-4 font-semibold md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                    <span className="border-b-2 border-[#D60B52] pb-[0.5px]">
                        Les pla
                    </span>
                    teaux techniques
                </h2>
                <p className="mb-6">
                    Découvrez un secteur professionnel par une mise en situation
                    réelle de travail (PMSMP), et apprenez-en pus sur le travail
                    en équipe, les conditions de travail, ainsi que sur les
                    premiers gestes techniques. Pendant 2 semaines, tout jeune
                    sans projet professionnel ou souhaitant valider un projet
                    découvrira plusieurs métiers grâce à de la pratique, des
                    mises en situation, qui définiront alors plus précisément
                    ses objectifs d’orientation.
                </p>
            </div>
            <div className="flex flex-col px-4 pt-4 font-semibold md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                    <span className="border-b-2 border-[#D60B52] pb-[0.5px]">
                        E2
                    </span>
                    C
                </h2>
                <p className="mb-6">
                    Un parcours qui vous propose un programme personnalisé pour
                    accéder à l’emploi, reposant sur l’amélioration des savoirs
                    de base (français, mathématiques, informatique) et le
                    développement de compétences professionnelles, sociales et
                    personnelles. L’E2C propose un parcours de formation en
                    alternance de 10 et mois et demi maximum, ainsi que des
                    stages en entreprises pour découvrir des métiers et
                    construire ainsi votre projet professionnel. La formation
                    est gratuite et indemnisée après une validation de période
                    d’essai d’un mois. Pour entreprendre ce parcours,
                    référez-vous en à votre conseiller de la Mission Locale.
                </p>
            </div>
            <div className="flex flex-col px-4 pt-4 font-semibold md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                    <span className="border-b-2 border-[#D60B52] pb-[0.5px]">
                        Le P
                    </span>
                    EE
                </h2>
                <p className="mb-6">
                    Un dispositif régional pour vous aider à construire et/ou
                    confirmer votre projet professionnel et/ou à développer des
                    compétences de base en situation professionnelle. Des stages
                    en entreprise, des plateaux techniques et des stages dans le
                    cadre des passerelles de découverte de l’apprentissage… sont
                    autant d’options disponibles dans ce dispositif immersif
                    pour accéder à une formation qualifiante ou à un emploi
                    direct, grâce à l’expérience acquise lors de ces stages.
                </p>
                <p className="mb-6">
                    La durée moyenne de ce parcours gratuit est de 736 heures en
                    centre auxquelles s’ajoutent 4 semaines en entreprise. Vous
                    bénéficiez alors du statut de stagiaire de la formation
                    professionnelle ainsi que d’une protection sociale.{" "}
                </p>
            </div>
            <div className="flex flex-col px-4 pt-4 font-semibold md:px-14 lg:px-20">
                <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                    <span className="border-b-2 border-[#D60B52] pb-[0.5px]">
                        L’EDI{" "}
                    </span>
                    (Espace Dynamique d’Insertion)
                </h2>
                <p className="mb-6">
                    Un parcours qui vous propose un programme personnalisé pour
                    accéder à l’emploi, reposant sur l’amélioration des savoirs
                    de base (français, mathématiques, informatique) et le
                    développement de compétences professionnelles, sociales et
                    personnelles. L’E2C propose un parcours de formation en
                    alternance de 10 et mois et demi maximum, ainsi que des
                    stages en entreprises pour découvrir des métiers et
                    construire ainsi votre projet professionnel. La formation
                    est gratuite et indemnisée après une validation de période
                    d’essai d’un mois. Pour entreprendre ce parcours,
                    référez-vous en à votre conseiller de la Mission Locale.
                </p>
                <InertiaLink
                    href="/prendre-rdv"
                    className="bg-[#D60B52] text-white font-semibold py-1 text-center rounded-lg text-sm mb-6 md:w-64"
                >
                    PRENDRE RDV AVEC UN CONSEILLER
                </InertiaLink>
            </div>
        </div>
    );
}

export default Sorienter;
