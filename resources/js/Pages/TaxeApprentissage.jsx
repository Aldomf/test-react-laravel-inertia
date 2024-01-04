import React from "react";

function TaxeApprentissage() {
  return (
    <div>
      <div
        className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
        style={{ backgroundImage: "url(/MicrosoftTeams-image14.png)" }}
      >
        <h1 className="md:text-3xl">Taxe d’Apprentissage </h1>
      </div>
      <div className="flex flex-col items-center">
        <div className="flex flex-col px-4 font-semibold md:px-14 lg:px-20">
          <p className="mb-4 mt-4">
            Soutenez l’insertion des jeunes en versant le solde de votre taxe
            d’apprentissage 2023 à la Mission Locale des Mureaux !{" "}
          </p>
          <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
            <span className="border-b-2 border-[#F29200] pb-[0.5px]">
              La taxe
            </span>{" "}
            d’apprentissage, comment cela fonctionne ?
          </h2>
          <p className="mb-6">
            La Mission Locale est habilitée à percevoir le solde de la Taxe
            d’Apprentissage au titre d’ « Organisme participant au Service
            Public de l’Orientation tout au long de sa vie ». C’est le seul
            impôt pour lequel le législateur laisse une liberté d’attribution
            aux entreprises.
          </p>
        </div>
        <div className="flex flex-col px-4 font-semibold md:px-14 lg:px-20">
          <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
            <span className="border-b-2 border-[#F29200] pb-[0.5px]">
              Pourquoi
            </span>{" "}
            verser à la Mission Locale des Mureaux ?
          </h2>
          <p className="mb-6">
            Pour aider les jeunes à s’insérer sur le marché de l’emploi, et leur
            ouvrir le champ des possibilités de carrières professionnelles. En
            participant aussi au financement des dépenses nécessaires de la
            Mission Locale pour le développement de l’apprentissage, ainsi que
            des formations technologiques et professionnelles pour ces mêmes
            jeunes.
          </p>
        </div>
        <div className="flex flex-col px-4 font-semibold md:px-14 lg:px-20">
          <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
            <span className="border-b-2 border-[#F29200] pb-[0.5px]">
              Comment
            </span>{" "}
            verser votre Taxe d’Apprentissage à la Mission Locale des Mureaux ?
          </h2>
          <p className="mb-6">
            En prenant directement contact avec nous, pour nous puissions en
            détail parcourir les différentes étapes à effectuer. Une fois la
            contribution effectuée, vous recevrez un reçu libératoire pour
            justifier votre paiement auprès de l’URSAFF et/ou de votre
            expert-comptable.
          </p>
        </div>
        <div className="flex flex-col px-4 font-semibold md:w-full md:items-center md:px-14 lg:px-20">
          <iframe
            width="260"
            height="170"
            src="https://www.youtube.com/embed/n8g2RKTn5_Y"
            title="YouTube Video"
            frameBorder="0"
            allowFullScreen
            className="mb-6 md:w-[99%] md:h-96 md:mt-6 lg:w-[70%] lg:h-[450px] xl:h-[550px]"
          ></iframe>
        </div>
      </div>
    </div>
  );
}

export default TaxeApprentissage;
