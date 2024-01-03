import SlideMenu from "@/Components/SlideMenu";
import Actualites from "@/Components/Actualites";
import Youtube from "@/Components/Youtube";
import Statistiques from "@/Components/Statistiques";
import Soutien from "@/Components/Soutien";
import Layout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";

function Accueil() {
    return (
        <>
            <Head title="Accueil" />
                <SlideMenu />
                <Actualites />
                <Youtube />
                <Statistiques />
                <Soutien />
        </>
    );
}

export default Accueil;
