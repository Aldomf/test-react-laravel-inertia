import React, { useEffect, useState, useRef } from "react";

function Statistiques() {
  const [isIntersecting, setIsIntersecting] = useState(false);
  const [currentNumber, setCurrentNumber] = useState(0);
  const [currentNumber1, setCurrentNumber1] = useState(0);
  const [currentNumber2, setCurrentNumber2] = useState(0);
  const [currentNumber3, setCurrentNumber3] = useState(0);
  const [currentNumber4, setCurrentNumber4] = useState(0);
  const [currentNumber5, setCurrentNumber5] = useState(0);

  const finalNumber = 10196;
  const finalNumber1 = 4050;
  const finalNumber2 = 7471;
  const finalNumber3 = 2973;
  const finalNumber4 = 16;
  const finalNumber5 = 70274;

  const statisticsRef = useRef(null);

  useEffect(() => {
    const handleScroll = () => {
      if (statisticsRef.current) {
        const boundingBox = statisticsRef.current.getBoundingClientRect();
        setIsIntersecting(boundingBox.top < window.innerHeight);
      }
    };

    window.addEventListener("scroll", handleScroll);

    // Initial check on mount
    handleScroll();

    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  }, []);

  useEffect(() => {
    if (isIntersecting) {
      const interval = setInterval(() => {
        setCurrentNumber((prevNumber) => {
          const increment = Math.ceil((finalNumber - prevNumber) / 50);
          return prevNumber + increment;
        });
      }, 20);

      return () => clearInterval(interval);
    }
  }, [isIntersecting]);

  useEffect(() => {
    if (isIntersecting) {
      const interval = setInterval(() => {
        setCurrentNumber1((prevNumber) => {
          const increment = Math.ceil((finalNumber1 - prevNumber) / 50);
          return prevNumber + increment;
        });
      }, 20);

      return () => clearInterval(interval);
    }
  }, [isIntersecting]);

  useEffect(() => {
    if (isIntersecting) {
      const interval = setInterval(() => {
        setCurrentNumber2((prevNumber) => {
          const increment = Math.ceil((finalNumber2 - prevNumber) / 50);
          return prevNumber + increment;
        });
      }, 20);

      return () => clearInterval(interval);
    }
  }, [isIntersecting]);

  useEffect(() => {
    if (isIntersecting) {
      const interval = setInterval(() => {
        setCurrentNumber3((prevNumber) => {
          const increment = Math.ceil((finalNumber3 - prevNumber) / 50);
          return prevNumber + increment;
        });
      }, 20);

      return () => clearInterval(interval);
    }
  }, [isIntersecting]);

  useEffect(() => {
    if (isIntersecting) {
      const interval = setInterval(() => {
        setCurrentNumber4((prevNumber) => {
          const increment = Math.ceil((finalNumber4 - prevNumber) / 50);
          return prevNumber + increment;
        });
      }, 20);

      return () => clearInterval(interval);
    }
  }, [isIntersecting]);

  useEffect(() => {
    if (isIntersecting) {
      const interval = setInterval(() => {
        setCurrentNumber5((prevNumber) => {
          const increment = Math.ceil((finalNumber5 - prevNumber) / 50);
          return prevNumber + increment;
        });
      }, 20);

      return () => clearInterval(interval);
    }
  }, [isIntersecting]);

  return (
    <div ref={statisticsRef} className="flex flex-col items-center md:items-start md:px-10 md:mt-10">
      <h1 className="mt-2 font-bold md:text-2xl">
        <span className="border-b-2 border-[#DB34C7] pb-[0.5px]">CETT</span>E
        ANNEE A LA MISSION LOCALE
      </h1>
      <div className="mb-4 font-semibold md:grid md:grid-cols-3 md:gap-4 md:w-full md:mb-10 lg:flex lg:justify-between">
        <div className="border-[#DB34C7] border-2 w-36 h-20 mt-10 relative">
          <p className="absolute top-[13px] left-1/2 transform -translate-x-1/2 -translate-y-full bg-white rounded-lg px-2 text-lg font-bold text-[#DB34C7]">
            {currentNumber.toLocaleString()}
          </p>
          <p className="text-center leading-tight text-sm mt-5">
            JEUNES
            <br />
            ACCOMPAGNES
          </p>
        </div>
        <div className="border-[#FF0000] border-2 w-36 h-20 mt-10 relative">
          <p className="absolute top-[13px] left-1/2 transform -translate-x-1/2 -translate-y-full bg-white rounded-lg px-2 text-lg font-bold text-[#FF0000]">
            {currentNumber1.toLocaleString()}
          </p>
          <p className="text-center leading-tight text-sm mt-5">
            JEUNES
            <br />
            EN EMPLOI
          </p>
        </div>
        <div className="border-[#87D2F0] border-2 w-36 h-20 mt-10 relative">
          <p className="absolute top-[13px] left-1/2 transform -translate-x-1/2 -translate-y-full bg-white rounded-lg px-2 text-lg font-bold text-[#87D2F0]">
            {currentNumber2.toLocaleString()}
          </p>
          <p className="text-center leading-tight text-sm mt-5">
            JEUNES
            <br />
            EN FORMATION
          </p>
        </div>
        <div className="border-[#ADFF2F] border-2 w-36 h-20 mt-10 relative">
          <p className="absolute top-[13px] left-1/2 transform -translate-x-1/2 -translate-y-full bg-white rounded-lg px-2 text-lg font-bold text-[#ADFF2F]">
            {currentNumber3.toLocaleString()}
          </p>
          <p className="text-center leading-tight text-sm mt-5">
            ENTRETIEN
            <br />
            ET ATELIERS
          </p>
        </div>
        <div className="border-[#FFA500] border-2 w-36 h-20 mt-10 relative">
          <p className="absolute top-[13px] left-1/2 transform -translate-x-1/2 -translate-y-full bg-white rounded-lg px-2 text-lg font-bold text-[#FFA500]">
            {currentNumber5.toLocaleString()}
          </p>
          <p className="text-center leading-tight text-sm mt-5">
             ATELIERS
          </p>
        </div>
        <div className="border-[#FFFF00] border-2 w-36 h-20 mt-10 relative">
          <p className="absolute top-[13px] left-1/2 transform -translate-x-1/2 -translate-y-full bg-white rounded-lg px-2 text-lg font-bold text-[#FFFF00]">
            {currentNumber4.toLocaleString()}
          </p>
          <p className="text-center leading-tight text-sm mt-5">
            PARTENAIRES
          </p>
        </div>
      </div>
    </div>
  );
}

export default Statistiques;

