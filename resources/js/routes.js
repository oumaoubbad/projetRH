import ModelesIndex from "./components/modeles/Index";
import ModelesCreate from "./components/modeles/Create";
import ModelesEdit from "./components/modeles/Edit";

export const routes = [
    {
        path: "/modeles",
        name: "ModelesIndex",
        component: ModelesIndex
    },
    {
        path: "/modeles/create",
        name: "ModelesCreate",
        component: ModelesCreate
    },
    {
        path: "/modeles/:id",
        name: "ModelesEdit",
        component: ModelesEdit
    }
];
