import ImageGallery from "react-image-gallery";
import { useMediaQuery } from 'react-responsive';
import "react-image-gallery/styles/css/image-gallery.css";

function Soutien() {

  const isTabletOrLarger = useMediaQuery({ minWidth: 768 });
  const isLaptopOrLarger = useMediaQuery({ minWidth: 1024 });


  const slidesTwoImages = [
    {
      pair: [
        { original: "/MicrosoftTeams-image5.png" },
        { original: "/MicrosoftTeams-image6.png" },
      ],
    },
    {
      pair: [
        { original: "/MicrosoftTeams-image7.png" },
        { original: "/MicrosoftTeams-image8.png" },
      ],
    },
    {
      pair: [
        { original: "/MicrosoftTeams-image9.png" },
        { original: "/MicrosoftTeams-image10.png" },
      ],
    },
    // Add more pairs as needed
  ];

  const slidesThreeImages = [
    {
      pair: [
        { original: "/MicrosoftTeams-image5.png" },
        { original: "/MicrosoftTeams-image6.png" },
        { original: "/MicrosoftTeams-image7.png" }, // Add the third image
      ],
    },
    {
      pair: [
        { original: "/MicrosoftTeams-image8.png" },
        { original: "/MicrosoftTeams-image9.png" },
        { original: "/MicrosoftTeams-image10.png" }, // Add the third image
      ],
    },
    // Add more pairs as needed
  ];

  const slidesSixImages = [
    {
      pair: [
        { original: "/MicrosoftTeams-image5.png" },
        { original: "/MicrosoftTeams-image6.png" },
        { original: "/MicrosoftTeams-image7.png" },
        { original: "/MicrosoftTeams-image8.png" },
        { original: "/MicrosoftTeams-image9.png" },
        { original: "/MicrosoftTeams-image10.png" },
      ],
    },
    {
      pair: [
        { original: "/MicrosoftTeams-image5.png" },
        { original: "/MicrosoftTeams-image6.png" },
        { original: "/MicrosoftTeams-image7.png" },
        { original: "/MicrosoftTeams-image8.png" },
        { original: "/MicrosoftTeams-image9.png" },
        { original: "/MicrosoftTeams-image10.png" },
      ],
    },
    // Add more pairs as needed
  ];

  const slides = isLaptopOrLarger ? slidesSixImages : (isTabletOrLarger ? slidesThreeImages : slidesTwoImages);

  return (
    <div className="bg-[#f6f6f6]">
      <h1 className='font-bold ml-4 mt-2 md:text-2xl md:ml-11 md:mt-10'>
        <span className='border-b-2 border-[#FFA500] pb-[0.5px]'>AVEC </span>LE SOUTIEN DE:
      </h1>
      <div className="flex items-center justify-center h-52">
        <ImageGallery
          items={slides}
          showPlayButton={false}
          showFullscreenButton={false}
          showThumbnails={false}
          showNav={false}
          autoPlay={true}
          showBullets={true}
          slideInterval={3000}
          slideDuration={1000}
          renderItem={(item) => (
            <div className="flex ">
              {item.pair.map((image, index) => (
                <img key={index} src={image.original} alt={`Slide ${index + 1}`} className="w-32 h-32 mx-2 md:mx-8 lg:mx-4 xl:mx-10" />
              ))}
            </div>
          )}
          className="w-full h-full"
        />
      </div>
    </div>
  );
};

export default Soutien