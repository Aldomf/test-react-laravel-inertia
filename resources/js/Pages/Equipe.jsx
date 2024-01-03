import React from "react";

function Equipe() {
  return (
    <div>
      <div
        className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
        style={{ backgroundImage: "url(/MicrosoftTeams-image11.png)" }}
      >
        <h1 className="md:text-3xl">NOTRE EQUIPE</h1>
      </div>
      <div className="flex flex-col items-center md:items-start md:px-14 md:pt-4 lg:px-20">
        <div>
          <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
            <span className="border-b-2 border-[#A4195C] pb-[0.5px]">POLE</span>{" "}
            DIRECTION
          </h2>
          <div>
            <h3>Prenom NOM</h3>
            <p className="mb-6">Fonction</p>
          </div>
          <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
            <span className="border-b-2 border-[#A4195C] pb-[0.5px]">POLE</span>{" "}
            STRUCTURE
          </h2>
          <div>
            <h3>Prenom NOM</h3>
            <p className="mb-6">Fonction</p>
          </div>
        </div>
      </div>
      <div className="flex flex-col items-center bg-[#f6f6f6] md:items-start md:px-14 lg:px-20">
        <div>
          <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
            <span className="border-b-2 border-[#A4195C] pb-[0.5px]">POLE</span>{" "}
            TECHNIQUE
          </h2>
          <div className="lg:grid lg:grid-cols-3 xl:grid-cols-5">
            <div className="lg:mr-40 xl:mr-36">
              <h3>Prenom NOM</h3>
              <p className="mb-6">Fonction</p>
            </div>
            <div className="lg:mr-40 xl:mr-36">
              <h3>Prenom NOM</h3>
              <p className="mb-6">Fonction</p>
            </div>
            <div className="lg:mr-40 xl:mr-36">
              <h3>Prenom NOM</h3>
              <p className="mb-6">Fonction</p>
            </div>
            <div className="lg:mr-40 xl:mr-36">
              <h3>Prenom NOM</h3>
              <p className="mb-6">Fonction</p>
            </div>
            <div className="lg:mr-40 xl:mr-36">
              <h3>Prenom NOM</h3>
              <p className="mb-6">Fonction</p>
            </div>
          </div>
        </div>
      </div>
      <div className="h-56 pt-4 flex justify-center items-center md:items-start md:justify-start md:px-14 lg:px-20">
        <img
          src=""
          alt=""
          className="w-[80%] h-[90%]"
        />
      </div>
    </div>
  );
}

export default Equipe;
