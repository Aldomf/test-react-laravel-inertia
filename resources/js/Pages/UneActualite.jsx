

function UneActualite() {
  return (
    <div>
        <div
        className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
        style={{ backgroundImage: "url(/MicrosoftTeams-image15.png)" }}
      >
        <h1 className="md:text-3xl">ACTUALITE</h1>
      </div>
      <div className=" flex flex-col items-center pt-6 bg-[#F6F6F6] md:px-14 lg:px-20">
        <div className="flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
          <h2 className="text-lg mb-2 text-[#2897d5] font-bold">TITRE DE L&apos;ACTUALITE</h2>
          <p className="mb-4">
            JJ/MM/AAAA
          </p>
          <p className="mb-4 text-[#2897d5]">
            #ALTERNANCE
          </p>
        </div>
        <div className="flex flex-col px-4 bg-white rounded-lg mb-4 pt-2 w-[90%]">
          <img src="" alt="image"  className="mb-6 rounded-lg"/>
          <p className="mb-4">
            Véritable technicien de l’image, le Photographe Professionnel sait
            comment composer une photo, comment l’éclairer
          </p>
        </div>
      </div>
    </div>
  )
}

export default UneActualite