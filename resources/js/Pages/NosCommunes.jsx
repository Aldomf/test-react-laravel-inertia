import { useMediaQuery } from "react-responsive";

function NosCommunes() {
  const isTabletOrLarger = useMediaQuery({ minWidth: 768 });
  const isLaptopOrLarger = useMediaQuery({ minWidth: 1024 });

  return (
    <div>
      <div
        className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
        style={{ backgroundImage: "url(/MicrosoftTeams-image11.png)" }}
      >
        <h1 className="md:text-3xl">NOS COMMUNES</h1>
      </div>
      {isTabletOrLarger ? (
        <div className="bg-[#f6f6f6] pt-2 pb-6 md:px-14 lg:px-20 md:pt-6">
          <h1 className="font-bold text-black text-lg mb-8 md:text-2xl">
            <span className="border-b-2 border-[#A4195C] pb-[0.5px]">
              COMMUNES
            </span>{" "}
            ADHERENTES
          </h1>
          <div className="flex justify-center">
            <img
              src="/carte_mission_locale_mureaux.svg"
              alt=""
              className="h-[500px]"
            />
          </div>
        </div>
      ) : (
        ""
      )}
      <div className="flex flex-col items-center mt-6">
        <div className="md:w-full md:px-14">
          <h1 className="font-bold text-black text-lg mb-8 md:text-2xl">
            <span className="border-b-2 border-[#A4195C] pb-[0.5px]">
              COMMUNES
            </span>{" "}
            ADHERENTES
          </h1>
        </div>
        <div className="md:w-full md:px-14 md:pr-28 md:flex md:flex-col lg:pr-36 lg:px-20">
          {isLaptopOrLarger ? (
            <div className="font-medium md:flex md:justify-between">
              <ul>
                <li>Aulnay Sur Mauldre</li>
                <li>Aubergenville</li>
                <li>Bouafle</li>
                <li>Brueil-En-Vexin</li>
                <li>Ecquevilly</li>
              </ul>
              <ul>
                <li>Evecquemont</li>
                <li>Flins Sur Seine</li>
                <li>Gaillon-Sur-Montcient</li>
                <li>Hardricourt</li>
                <li>Jambville</li>
              </ul>
              <ul>
                <li>Juziers</li>
                <li>Lainville</li>
                <li>Les Mureaux</li>
                <li>Meulan En Yvelines</li>
                <li>Mézy-Sur-Seine</li>
              </ul>
              <ul>
                <li>Montalet Le Bois</li>
                <li>Nézel</li>
                <li>Oinville-Sur-Montcient</li>
                <li>Tessancourt Sur Aubette</li>
                <li>Vaux Sur Seine</li>
              </ul>
            </div>
          ) : (
            <div className="font-medium md:flex md:justify-between">
              <ul>
                <li>Aulnay Sur Mauldre</li>
                <li>Aubergenville</li>
                <li>Bouafle</li>
                <li>Brueil-En-Vexin</li>
                <li>Ecquevilly</li>
                <li>Evecquemont</li>
                <li>Flins Sur Seine</li>
                <li>Gaillon-Sur-Montcient</li>
                <li>Hardricourt</li>
                <li>Jambville</li>
              </ul>
              <ul>
                <li>Juziers</li>
                <li>Lainville</li>
                <li>Les Mureaux</li>
                <li>Meulan En Yvelines</li>
                <li>Mézy-Sur-Seine</li>
                <li>Montalet Le Bois</li>
                <li>Nézel</li>
                <li>Oinville-Sur-Montcient</li>
                <li>Tessancourt Sur Aubette</li>
                <li>Vaux Sur Seine</li>
              </ul>
            </div>
          )}
        </div>
      </div>
      {isLaptopOrLarger ? (
        <div className="bg-[#f6f6f6] mt-6 pt-2 pb-6 md:flex md:flex-col md:px-14 lg:px-20 lg:flex lg:flex-row lg:justify-center xl:justify-around">
          <div className="rounded-b-2xl rounded-t-md mt-6 mx-4 bg-white md:w-72">
            <div className="bg-[#A4195C] rounded-md text-center py-1 text-white">
              ANTENNE PRINCIPALE
            </div>
            <h2 className="font-semibold ml-4 mb-2">LES MUREAUX</h2>
            <div className="text-xs ml-4 font-medium pb-2">
              <p>38 AV. PAUL RAOULT, 78130 LES MUREAUX</p>
              <p>08h45 – 12h15 // 13h30 17 h30</p>
              <p>hormis le vendredi 17h15</p>
              <p>01 30 91 21 50</p>
              <p>contact@missionlocalelesmureaux.org</p>
            </div>
          </div>
          <div className="rounded-b-2xl rounded-t-md mt-6 mx-4 bg-white md:w-72">
            <div className="bg-[#F29200] rounded-md text-center py-1 text-white">
              PERMANENCES
            </div>
            <h2 className="font-semibold ml-4 mb-2">MEULAN</h2>
            <div className="text-xs ml-4 font-medium pb-2">
              <p>
                rue de la ferme du paradis <br />
                Le 1er et 3ème mardi de chaque mois de
              </p>
              <p>14h00 – 17h00</p>
              <p>Contacter Les Mureaux</p>
            </div>
          </div>
          <div className="rounded-b-2xl rounded-t-md mt-6 mx-4 bg-white md:w-72">
            <div className="bg-[#F29200] rounded-md text-center py-1 text-white">
              PERMANENCES
            </div>
            <h2 className="font-semibold ml-4 mb-2">AUBERGENVILLE</h2>
            <div className="text-xs ml-4 font-medium pb-2">
              <p>
                MAISON DE TOUS
                <br />
                LES MERCREDIS
              </p>
              <p>14H00 - 17H00</p>
              <p>01 30 90 36 63</p>
            </div>
          </div>
        </div>
      ) : (
        <div className="bg-[#f6f6f6] mt-6 pt-2 pb-6 md:flex md:flex-col md:px-14">
          <div className="md:flex md:justify-center">
            <div className="rounded-b-2xl rounded-t-md mt-6 mx-4 bg-white md:w-72">
              <div className="bg-[#A4195C] rounded-md text-center py-1 text-white">
                ANTENNE PRINCIPALE
              </div>
              <h2 className="font-semibold ml-4 mb-2">LES MUREAUX</h2>
              <div className="text-xs ml-4 font-medium pb-2">
                <p>38 AV. PAUL RAOULT, 78130 LES MUREAUX</p>
                <p>08h45 – 12h15 // 13h30 17 h30</p>
                <p>hormis le vendredi 17h15</p>
                <p>01 30 91 21 50</p>
                <p>contact@missionlocalelesmureaux.org</p>
              </div>
            </div>
          </div>
          <div className="md:flex md:justify-center">
            <div className="rounded-b-2xl rounded-t-md mt-6 mx-4 bg-white md:w-72">
              <div className="bg-[#F29200] rounded-md text-center py-1 text-white">
                PERMANENCES
              </div>
              <h2 className="font-semibold ml-4 mb-2">MEULAN</h2>
              <div className="text-xs ml-4 font-medium pb-2">
                <p>
                  rue de la ferme du paradis <br />
                  Le 1er et 3ème mardi de chaque mois de
                </p>
                <p>14h00 – 17h00</p>
                <p>Contacter Les Mureaux</p>
              </div>
            </div>
            <div className="rounded-b-2xl rounded-t-md mt-6 mx-4 bg-white md:w-72">
              <div className="bg-[#F29200] rounded-md text-center py-1 text-white">
                PERMANENCES
              </div>
              <h2 className="font-semibold ml-4 mb-2">AUBERGENVILLE</h2>
              <div className="text-xs ml-4 font-medium pb-2">
                <p>
                  MAISON DE TOUS
                  <br />
                  LES MERCREDIS
                </p>
                <p>14H00 - 17H00</p>
                <p>01 30 90 36 63</p>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}

export default NosCommunes;
