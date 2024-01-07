const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"admin.registerCandidat":{"uri":"admin\/registerCandidat","methods":["GET","HEAD"]},"admin.registerCandidat.post":{"uri":"admin\/registerCandidat","methods":["POST"]},"home":{"uri":"\/","methods":["GET","HEAD"]},"nosmissions":{"uri":"nos-missions","methods":["GET","HEAD"]},"noscommunes":{"uri":"nos-communes","methods":["GET","HEAD"]},"gouvernance":{"uri":"gouvernance","methods":["GET","HEAD"]},"equipe":{"uri":"equipe","methods":["GET","HEAD"]},"seformer":{"uri":"se-former","methods":["GET","HEAD"]},"orienter":{"uri":"sorienter","methods":["GET","HEAD"]},"trouverUnEmploi":{"uri":"trouver-un-emploi","methods":["GET","HEAD"]},"etreAccompagne":{"uri":"etre-accompagne","methods":["GET","HEAD"]},"actualite":{"uri":"actualites","methods":["GET","HEAD"]},"actualiteDetail":{"uri":"actualites\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"ateliers":{"uri":"ateliers","methods":["GET","HEAD"]},"atelierDetail":{"uri":"ateliers\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"notreexpertise":{"uri":"expertise","methods":["GET","HEAD"]},"taxeapprentissage":{"uri":"taxe-apprentissage","methods":["GET","HEAD"]},"demarcheRSE":{"uri":"demarche-rse","methods":["GET","HEAD"]},"contact":{"uri":"contact","methods":["GET","HEAD"]},"inscriptionjeune":{"uri":"connexion-jeune","methods":["GET","HEAD"]},"inscriptionentreprise":{"uri":"connexion-entreprise","methods":["GET","HEAD"]},"formation":{"uri":"formations","methods":["GET","HEAD"]},"formationDetail":{"uri":"formations\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"profile.edit":{"uri":"profile","methods":["GET","HEAD"]},"profile.update":{"uri":"profile","methods":["PATCH"]},"profile.destroy":{"uri":"profile","methods":["DELETE"]},"register":{"uri":"register","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.store":{"uri":"reset-password","methods":["POST"]},"verification.notice":{"uri":"verify-email","methods":["GET","HEAD"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"],"parameters":["id","hash"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"password.confirm":{"uri":"confirm-password","methods":["GET","HEAD"]},"password.update":{"uri":"password","methods":["PUT"]},"logout":{"uri":"logout","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
