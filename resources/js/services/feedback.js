/**
 * @typedef {object} FeedbackData
 * @property {string|null} name
 * @property {string} email
 * @property {string} text
 */


/**
 * @typedef {object} Feedback
 * @property {string|null} id
 * @property {string|null} author_name
 * @property {string} text
 * @property {string} created_at
 */

const baseURL = 'http://localhost/feedbacks';

export default {
    /**
     *
     * @param {FeedbackData} data
     * @return Promise<Feedback>
     */
    async create(data) {
        const response = await fetch(baseURL, {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            return response.json();
        }

        throw new Error(
            await response.text()
        );
    }
};
