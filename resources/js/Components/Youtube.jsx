import React from "react";

function Youtube() {
  return (
    <div className="flex flex-col items-center bg-[#f6f6f6] md:items-start md:px-4">
      <div className="md:w-full md:px-6 md:my-10">
        <h1 className="font-bold mb-6 mt-3 md:text-2xl">
          <span className="border-b-2 border-[#ADFF2F] pb-[0.5px]">LA M</span>
          ISSION LOCALE EN IMAGE
        </h1>
        <div className="lg:flex lg:justify-center">
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

export default Youtube;
