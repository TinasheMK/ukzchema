import axios from "axios";

const submitJoiningDetails = (details) => {
    return new Promise((resolve, reject) => {
        axios.post('/api/join', details)
            .then(async({ data }) => {
                return resolve(data);
            })
            .catch(err => {
                console.log(Object.keys(err));
                return reject(err)
            })
    })
}

const isUnique = (email) => axios.post('/api/unique-email', { email });

export {
    submitJoiningDetails,
    isUnique
}