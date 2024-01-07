import { useForm } from "react-hook-form";
import { Inertia } from "@inertiajs/inertia";
import { useMediaQuery } from "react-responsive";

function PreInscription() {
    const {
        register,
        handleSubmit,
        formState: { errors },
    } = useForm();
    const isLaptopOrLarger = useMediaQuery({ minWidth: 1024 });

    const onSubmit = async (data) => {
        try {
            await Inertia.post(route("admin.registerCandidat.post"), data);
            // You can add a success message or redirect logic here if needed
        } catch (error) {
            // Handle errors if needed
            console.error(error);
        }
    };

    return (
        <div>
            <div
                className="bg-image bg-cover bg-center h-12 flex justify-center items-center text-white font-bold sm:h-16 md:h-28 lg:h-40 xl:h-52"
                style={{ backgroundImage: "url(/MicrosoftTeams-image12.png)" }}
            >
                <h1 className="md:text-3xl">PRÉ-INSCRIPTION</h1>
            </div>
            <div>
                <div className="flex flex-col px-4 pt-4 pb-6 font-semibold bg-[#F6F6F6] md:px-20 lg:px-56 xl:px-96">
                    <h2 className="font-bold text-black text-lg mb-4 md:text-2xl">
                        <span className="border-b-2 border-[#D60B52] pb-[0.5px]">
                            FORMU
                        </span>
                        LAIRE DE PRÉ-INSCRIPTION
                    </h2>
                    <p className="mb-6">
                        En remplissant ce formulaire vous serez contacté
                        prochainement par un conseilller qui vous proposera un
                        rendez-vous.
                    </p>
                    <p className="mb-6 text-sm font-semibold">
                        NB: L'inscription sera définitive lorsque votre
                        conseiller(ère) aura en sa possession vos justificatifs
                        (pièce d'identité et justificatif de domicile).
                    </p>
                    <form
                        className="flex flex-col"
                        onSubmit={handleSubmit(onSubmit)}
                    >
                        {isLaptopOrLarger ? (
                            <div className="flex flex-col">
                                <div className="flex justify-between">
                                    <div className="flex flex-col w-[45%]">
                                        <input
                                            {...register("last_name", {
                                                required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                            placeholder="Nom*"
                                        />
                                        {errors.last_name && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )}

                                        <input
                                            {...register("first_name", {
                                                required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                            placeholder="Prénom*"
                                        />
                                        {errors.first_name && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )}

                                        <input
                                            {...register("phone", {
                                                required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                            placeholder="Téléphone*"
                                            type="tel"
                                        />
                                        {errors.phone && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )}

                                        <input
                                            {...register("dateOfBirth", {
                                                required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                            placeholder="Date de naissance"
                                            type="date"
                                        />
                                        {errors.dateOfBirth && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )}

                                        <select
                                            {...register("schooled", {
                                                //required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                        >
                                            <option
                                                value=""
                                                disabled
                                                selected
                                                hidden
                                            >
                                                Scolarisé*
                                            </option>
                                            <option value="yes">
                                                Scolarisé: Oui
                                            </option>
                                            <option value="no">
                                                Scolarisé: Non
                                            </option>
                                        </select>
                                        {/* {errors.schooled && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )} */}
                                    </div>

                                    <div className="flex flex-col w-[45%]">
                                        <input
                                            {...register("email", {
                                                required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                            placeholder="Adresse email*"
                                            type="email"
                                        />
                                        {errors.email && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )}

                                        <input
                                            {...register("password", {
                                                required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                            placeholder="Mot de passe"
                                            type="password"
                                        />
                                        {errors.password && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )}

                                        <input
                                            {...register("age", {
                                                //required: true,
                                            })}
                                            className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                            placeholder="Âge*"
                                            type="number"
                                        />
                                        {/* {errors.age && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )} */}
                                        <select
                                            {...register("city", {
                                                required: true,
                                            })}
                                            className="rounded-md p-2 text-left mb-6"
                                        >
                                            <option
                                                value=""
                                                disabled
                                                selected
                                                hidden
                                            >
                                                Commune*
                                            </option>
                                            <option value="Aulnay Sur Mauldre">
                                                Aulnay Sur Mauldre
                                            </option>
                                            <option value="Aubergenville">
                                                Aubergenville
                                            </option>
                                            <option value="Bouafle">
                                                Bouafle
                                            </option>
                                            <option value="Brueil-En-Vexin">
                                                Brueil-En-Vexin
                                            </option>
                                            <option value="Ecquevilly">
                                                Ecquevilly
                                            </option>
                                            <option value="Evecquemont">
                                                Evecquemont
                                            </option>
                                            <option value="Flins Sur Seine">
                                                Flins Sur Seine
                                            </option>
                                            <option value="Gaillon-Sur-Montcient">
                                                Gaillon-Sur-Montcient
                                            </option>
                                            <option value="Hardricourt">
                                                Hardricourt
                                            </option>
                                            <option value="Jambville">
                                                Jambville
                                            </option>
                                            <option value="Juziers">
                                                Juziers
                                            </option>
                                            <option value="Lainville">
                                                Lainville
                                            </option>
                                            <option value="Les Mureaux">
                                                Les Mureaux
                                            </option>
                                            <option value="Meulan En Yvelines">
                                                Meulan En Yvelines
                                            </option>
                                            <option value="Mézy-Sur-Seine">
                                                Mézy-Sur-Seine
                                            </option>
                                            <option value="Montalet Le Bois">
                                                Montalet Le Bois
                                            </option>
                                            <option value="Nézel">Nézel</option>
                                            <option value="Oinville-Sur-Montcient">
                                                Oinville-Sur-Montcient
                                            </option>
                                            <option value="Tessancourt Sur Aubette">
                                                Tessancourt Sur Aubette
                                            </option>
                                            <option value="Vaux Sur Seine">
                                                Vaux Sur Seine
                                            </option>
                                        </select>
                                        {errors.city && (
                                            <span className="text-red-600 text-center mb-4">
                                                Ce champ est obligatoire
                                            </span>
                                        )}
                                    </div>
                                </div>
                                <div className="flex mb-6 mt-4">
                                    <div className="mr-2">
                                        <input
                                            {...register("acceptTerms", {
                                                required: true,
                                            })}
                                            type="checkbox"
                                        />
                                    </div>
                                    <div>
                                        <p className="font-bold">
                                            J'accepte d'être contacté par la
                                            Mission Locale des Mureaux et
                                            j'accepte que les informations
                                            fournies alimentent mon dossier
                                            d'inscription{" "}
                                        </p>
                                    </div>
                                </div>
                                <div className="flex justify-center">
                                    <button
                                        type="submit"
                                        className="bg-[#D60B52] text-white py-1 p-2 rounded-md mb-8 font-semibold w-[80%]"
                                    >
                                        ENVOYER MA DEMANDE DE PRÉ-INSCRIPTION
                                    </button>
                                </div>
                            </div>
                        ) : (
                            <div className="flex flex-col md:mr-80">
                                <input
                                    {...register("last_name", {
                                        required: true,
                                    })}
                                    className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                    placeholder="Nom*"
                                />
                                {errors.last_name && (
                                    <span className="text-red-600 text-center mb-4">
                                        Ce champ est obligatoire
                                    </span>
                                )}

                                <input
                                    {...register("first_name", { required: true })}
                                    className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                    placeholder="Prénom*"
                                />
                                {errors.first_name && (
                                    <span className="text-red-600 text-center mb-4">
                                        Ce champ est obligatoire
                                    </span>
                                )}

                                <input
                                    {...register("phone", { required: true })}
                                    className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                    placeholder="Téléphone*"
                                    type="tel"
                                />
                                {errors.phone && (
                                    <span className="text-red-600 text-center mb-4">
                                        Ce champ est obligatoire
                                    </span>
                                )}

                                <select
                                    {...register("schooled", {
                                        required: true,
                                    })}
                                    className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                >
                                    <option value="" disabled selected hidden>
                                        Scolarisé*
                                    </option>
                                    <option value="yes">Scolarisé: Oui</option>
                                    <option value="no">Scolarisé: Non</option>
                                </select>
                                {errors.schooled && (
                                    <span className="text-red-600 text-center mb-4">
                                        Ce champ est obligatoire
                                    </span>
                                )}

                                <input
                                    {...register("email", { required: true })}
                                    className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                    placeholder="Adresse email*"
                                    type="email"
                                />
                                {errors.email && (
                                    <span className="text-red-600 text-center mb-4">
                                        Ce champ est obligatoire
                                    </span>
                                )}

                                <input
                                    {...register("age", { required: true })}
                                    className="rounded-md p-2 text-left placeholder-black placeholder-opacity-75 mb-4"
                                    placeholder="Âge*"
                                    type="number"
                                />
                                {errors.age && (
                                    <span className="text-red-600 text-center mb-4">
                                        Ce champ est obligatoire
                                    </span>
                                )}
                                <select
                                    {...register("city", { required: true })}
                                    className="rounded-md p-2 text-left mb-6"
                                >
                                    <option value="" disabled selected hidden>
                                        Commune*
                                    </option>
                                    <option value="Aulnay Sur Mauldre">
                                        Aulnay Sur Mauldre
                                    </option>
                                    <option value="Aubergenville">
                                        Aubergenville
                                    </option>
                                    <option value="Bouafle">Bouafle</option>
                                    <option value="Brueil-En-Vexin">
                                        Brueil-En-Vexin
                                    </option>
                                    <option value="Ecquevilly">
                                        Ecquevilly
                                    </option>
                                    <option value="Evecquemont">
                                        Evecquemont
                                    </option>
                                    <option value="Flins Sur Seine">
                                        Flins Sur Seine
                                    </option>
                                    <option value="Gaillon-Sur-Montcient">
                                        Gaillon-Sur-Montcient
                                    </option>
                                    <option value="Hardricourt">
                                        Hardricourt
                                    </option>
                                    <option value="Jambville">Jambville</option>
                                    <option value="Juziers">Juziers</option>
                                    <option value="Lainville">Lainville</option>
                                    <option value="Les Mureaux">
                                        Les Mureaux
                                    </option>
                                    <option value="Meulan En Yvelines">
                                        Meulan En Yvelines
                                    </option>
                                    <option value="Mézy-Sur-Seine">
                                        Mézy-Sur-Seine
                                    </option>
                                    <option value="Montalet Le Bois">
                                        Montalet Le Bois
                                    </option>
                                    <option value="Nézel">Nézel</option>
                                    <option value="Oinville-Sur-Montcient">
                                        Oinville-Sur-Montcient
                                    </option>
                                    <option value="Tessancourt Sur Aubette">
                                        Tessancourt Sur Aubette
                                    </option>
                                    <option value="Vaux Sur Seine">
                                        Vaux Sur Seine
                                    </option>
                                </select>
                                {errors.city && (
                                    <span className="text-red-600 text-center mb-4">
                                        Ce champ est obligatoire
                                    </span>
                                )}
                                <button
                                    type="submit"
                                    className="bg-[#D60B52] text-white py-1 p-2 rounded-md mb-8 font-semibold w-[50%]"
                                >
                                    ENVOYER
                                </button>
                            </div>
                        )}

                        {isLaptopOrLarger ? (
                            ""
                        ) : (
                            <div className="flex mb-6">
                                <div className="mr-2">
                                    <input
                                        {...register("acceptTerms", {
                                            //required: true,
                                        })}
                                        type="checkbox"
                                    />
                                </div>
                                <div>
                                    <p className="font-bold">
                                        J'accepte d'être contacté par la Mission
                                        Locale des Mureaux et j'accepte que les
                                        informations fournies alimentent mon
                                        dossier d'inscription{" "}
                                    </p>
                                </div>
                            </div>
                        )}
                        <p className="text-sm">
                            Une fois le formulaire de pré-inscription validé,
                            vous serez contacté afin de fixer un rendez-vous
                            obligatoire avec un conseiller pour finaliser votre
                            inscription.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default PreInscription;
